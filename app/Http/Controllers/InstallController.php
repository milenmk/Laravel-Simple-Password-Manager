<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDO;
use PDOException;

/**
 * Class to manage application install
 */
class InstallController extends Controller
{

    /**
     * Check if the application is installed (file install.lock is NOT present)
     * If installed: redirect to /
     * If not installed, check for database connection with the credentials from the .env file, run migrations and redirect to register page
     * If database connection properties are not set in the .env file and connection cannot be established, redirect to install page
     *
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index(): View|Factory|Redirector|RedirectResponse|Application
    {

        if (File::exists(config_path('install.lock'))) {
            config(['app.installed' => true]);

            return redirect('/');
        }

        if ($this->checkDatabaseConnection()) {
            Artisan::call('migrate');
            $this->createOptions();

            File::put(config_path('install.lock'), '');
            config(['app.installed' => true]);

            return redirect('/register');
        }

        return view('install.index');
    }

    /**
     * Check connection to database
     *
     * @return bool
     */
    private function checkDatabaseConnection(): bool
    {

        if (DB::connection()->getPdo()) {
            return true;
        }

        return false;
    }

    /**
     * Insert some predefined global options into `options` table
     *
     * @return void
     *
     */
    private function createOptions(): void
    {

        DB::table('options')->insert(
            [
                ['name' => 'DISABLE_SYSLOG', 'value' => 0, 'description' => 'Disable application log'],
                ['name' => 'PAGINATION_NUM', 'value' => 10, 'description' => 'Number of records for pagination in front-end'],
                ['name' => 'NUM_LIMIT_ADMIN_DASHBOARD', 'value' => 10, 'description' => 'Number of records for pagination in admin dashbord'],
                ['name' => 'RECORDS_TYPES', 'value' => 'website,ftp,database', 'description' => 'Comma-separated list of available records types'],
            ]
        );
    }

    /**
     * Process form.
     *
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {

        // Validate the form data
        $request->validate(
            [
                'DB_HOST'         => 'required',
                'DB_PORT'         => 'required',
                'DB_DATABASE'     => 'required',
                'DB_USERNAME'     => 'required',
                'DB_PASSWORD'     => 'required',
                'create_database' => 'boolean',
                'root_username'   => 'required_if:create_database,1',
                'root_password'   => 'required_if:create_database,1',
            ]
        );

        // Update the .env file with the form data
        $this->updateEnvFile($request->all());

        // Check if database connection can be established
        // If not, call a method to create the database with the root user data provided in the form
        if (!$this->checkDatabaseConnection()) {
            // Create database with root user data
            if ($request->get('create_database')) {
                $this->createDatabase($request->all());
            } else {
                return redirect()->back()->withErrors(['Could not connect to the database']);
            }
        }

        // Migrate tables
        Artisan::call('migrate');

        // Add predefined options to `options` table
        $this->createOptions();

        // Create install.lock file to restrict access to the installer
        File::put(config_path('install.lock'), '');

        config(['app.installed' => true]);

        return redirect('/register');
    }

    /**
     * Update the .env file with the data provided in the form
     *
     * @param array $data
     *
     * @return void
     */
    private function updateEnvFile(array $data): void
    {

        $envFile = file_get_contents(base_path('.env'));
        $envFile = str_replace(
            [
                'DB_HOST=' . env('DB_HOST'),
                'DB_PORT=' . env('DB_PORT'),
                'DB_DATABASE=' . env('DB_DATABASE'),
                'DB_USERNAME=' . env('DB_USERNAME'),
                'DB_PASSWORD=' . env('DB_PASSWORD'),
            ],
            [
                'DB_HOST=' . $data['DB_HOST'],
                'DB_PORT=' . $data['DB_PORT'],
                'DB_DATABASE=' . $data['DB_DATABASE'],
                'DB_USERNAME=' . $data['DB_USERNAME'],
                'DB_PASSWORD=' . $data['DB_PASSWORD'],
            ],
            $envFile
        );
        file_put_contents(base_path('.env'), $envFile);
    }

    /**
     * Create database using root user
     *
     * @param array $data
     *
     * @return RedirectResponse|void
     */
    private function createDatabase(array $data)
    {

        try {
            $pdo = new PDO("mysql:host={$data['DB_HOST']};port={$data['DB_PORT']}", $data['root_username'], $data['root_password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$data['DB_DATABASE']}`");
        }
        catch (PDOException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

}
