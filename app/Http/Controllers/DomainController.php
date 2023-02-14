<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Controller to manage user domains
 */
class DomainController extends Controller
{

    /**
     * Show all domains
     *
     * @return Application|Factory|View
     */
    public static function index(): View|Factory|Application
    {

        $domains = Domain::where('user_id', auth()->id())->paginate(config('PAGINATION_NUM'));

        return view('domains', compact('domains'));
    }

    /**
     * Store a new Domain instance in the database
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        Domain::create(
            [
                'name'    => $request->name,
                'user_id' => auth()->id(),
            ]
        );

        return redirect('/');
    }

    /**
     * Show create form
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {

        return view('domains.create');
    }

    /**
     * Show edit form
     *
     * @param Domain $domain
     *
     * @return Application|Factory|View
     */
    public function edit(Domain $domain): View|Factory|Application
    {

        return view('domains.edit', compact('domain'));
    }

    /**
     * Update a Domain instance in the database
     *
     * @param Request $request
     * @param Domain  $domain
     *
     * @return RedirectResponse
     */
    public function update(Request $request, Domain $domain): RedirectResponse
    {

        $formFields = $request->validate(
            [
                'name' => 'required',
            ]
        );

        $domain->update($formFields);

        return redirect('/');
    }

    /**
     * Delete a Domain instance from the database
     *
     * @param Domain $domain
     *
     * @return RedirectResponse
     */
    public function destroy(Domain $domain): RedirectResponse
    {

        $domain->delete();

        return redirect('/');
    }

}
