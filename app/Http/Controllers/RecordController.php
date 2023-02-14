<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Record;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function strlen;

/**
 * Controller to manage user records
 */
class RecordController extends Controller
{

    /**
     * Show all records
     *
     * @return Application|Factory|View
     */
    public static function index(): View|Factory|Application
    {

        $records = Record::filter(request(['domain_id']))->where('user_id', auth()->id())->paginate(config('PAGINATION_NUM'));

        // Decrypt password for each record
        foreach ($records as $record) {
            //$record->password = $record->decryptPassword($record->password);
            $record->password = (new self())->decryptPassword($record->password);
        }

        return view('records', compact('records'));
    }

    /**
     * Decrypt password using OpenSSL library
     *
     * @param string $password
     *
     * @return string
     */
    private function decryptPassword(string $password): string
    {

        $iv = base64_decode(env('APP_IV'));
        $key = substr(env('APP_KEY'), 7, 16);

        return openssl_decrypt($password, 'AES-128-CBC', $key, 0, $iv);
    }

    /**
     * Store a new Record instance in the database
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request): RedirectResponse
    {

        // Encrypt the password
        $password = $this->encryptPassword($request->password);

        // Create record
        Record::create(
            [
                'type'      => $request->name,
                'url'       => $request->url,
                'username'  => $request->username,
                'password'  => $password,
                'domain_id' => $request->domain_id,
                'user_id'   => auth()->id(),
            ]
        );

        return redirect('/');
    }

    /**
     * Encrypt password using OpenSSL library
     *
     * @param string $password
     *
     * @return string
     * @throws Exception
     */
    public function encryptPassword(string $password): string
    {

        $key = env('APP_KEY');
        if (!$key || strlen($key) < 24) {
            exec('php artisan key:generate');
            $key = env('APP_KEY');
        }
        $key = substr($key, 7, 16);

        $iv = base64_decode(env('APP_IV'));

        return openssl_encrypt($password, 'AES-128-CBC', $key, 0, $iv);
    }

    /**
     * Display the records creation view.
     */
    public function create(): \Illuminate\View\View
    {

        return view('records.create');
    }

    /**
     * Show edit form
     *
     * @param Record $record
     *
     * @return Application|Factory|View
     */
    public function edit(Record $record): View|Factory|Application
    {

        return view('records.edit', compact('record'));
    }

    /**
     * Update a Domain instance in the database
     *
     * @param Request $request
     * @param Record  $record
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, Record $record): RedirectResponse
    {

        $formFields = $request->validate(
            [
                'type'      => 'required',
                'url'       => 'required',
                'username'  => 'required',
                'password'  => 'required',
                'domain_id' => 'required',
            ]
        );

        // Encrypt the password
        $record->password = $this->encryptPassword($formFields['password']);

        // Save
        $record->save();

        return redirect('/records');
    }

    /**
     * Delete a Domain instance from the database
     *
     * @param Record $record
     *
     * @return RedirectResponse
     */
    public function destroy(Record $record): RedirectResponse
    {

        $record->delete();

        return redirect('/records');
    }

}
