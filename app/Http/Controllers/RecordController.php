<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

        Record::create(
            [
                'type'      => $request->name,
                'url'       => $request->url,
                'username'  => $request->username,
                'password'  => $request->password,
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

        $record->update($formFields);

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

}
