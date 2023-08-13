<?php

namespace App\Http\Controllers;

use App\Models\Options;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OptionsController extends Controller
{

    /**
     * Store a new option instance in the database
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        Options::create(
            [
                'name'        => $request->name,
                'value'       => $request->value,
                'description' => $request->description,
            ]
        );

        return redirect('admin.options');
    }

    /**
     * Show edit form
     *
     * @param Options $option
     *
     * @return Application|Factory|View
     */
    public function edit(Options $option): View|Factory|Application
    {

        return view('admin.option_edit', compact('option'));
    }

    /**
     * Update a Domain instance in the database
     *
     * @param Request $request
     * @param Options $option
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Options $option): RedirectResponse
    {

        $formFields = $request->validate(
            [
                'name'        => 'max:255',
                'value'       => 'required',
                'description' => 'max:255',
            ]
        );

        $option->update($formFields);

        return redirect('/pm-admin/options');
    }

}
