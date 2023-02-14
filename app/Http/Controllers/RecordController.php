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
use Illuminate\Support\Str;

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
    public static function index()
    {

        $records = Record::filter(request(['domain_id']))->where('user_id', auth()->id())->paginate(config('PAGINATION_NUM'));

        // Decrypt password for each record
        foreach ($records as $record) {
            //$record->password = $record->decryptPassword($record->password);
            $record->password = (new \App\Http\Controllers\RecordController())->decryptPassword($record->password);
        }

        return view('records', compact('records'));
    }

    /**
     * Store a new Record instance in the database
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
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
    public function edit(Record $record)
    {

        return view('records.edit', ['record' => $record]);
    }

    /**
     * Update a Domain instance in the database
     *
     * @param Request $request
     * @param Record  $record
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Record $record)
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
    public function destroy(Record $record)
    {

        $record->delete();

        return redirect('/records');
    }

    /**
     * Encrypt password using OpenSSL library
     *
     * @param $passsword
     *
     * @return false|string
     * @throws Exception
     */
    public function encryptPassword($passsword)
    {
        $key = env('APP_KEY');
        if (!$key || strlen($key) < 24) {
            exec('php artisan key:generate');
            $key = env('APP_KEY');
        }
        $key = substr($key, 7, 16);

        $iv = base64_decode(env('APP_IV'));

        return openssl_encrypt($passsword, 'AES-128-CBC', $key, 0, $iv);
    }

    /**
     * Decrypt password using OpenSSL library
     *
     * @param $passsword
     *
     * @return false|string
     */
    private function decryptPassword($passsword)
    {
        $iv = base64_decode(env('APP_IV'));
        $key = substr(env('APP_KEY'), 7, 16);

        return openssl_decrypt($passsword, 'AES-128-CBC', $key, 0, $iv);
    }

}
