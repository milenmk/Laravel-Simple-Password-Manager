<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Options;
use App\Models\Record;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{

    /**
     * Admin main dashboard
     *
     * @return View|Factory|Application
     */
    public static function index(): View|Factory|Application
    {

        $limit = (int)config('NUM_LIMIT_ADMIN_DASHBOARD');

        $users = User::get()->sortBy('created_at', SORT_REGULAR, true)->take($limit);
        $domains = Domain::all();
        $records = Record::all();

        $user_domains = User::withCount('domains')->get()->sortBy('domains_count', SORT_REGULAR, true)->take($limit);
        $user_records = User::withCount('records')->get()->sortBy('records_count', SORT_REGULAR, true)->take($limit);

        return view('adminboard', compact('users', 'domains', 'records', 'user_domains', 'user_records'));
    }

    /**
     * Users view
     *
     * @return View|Factory|Application
     */
    public static function users(): View|Factory|Application
    {

        $users = User::sortable()->paginate(config('PAGINATION_NUM'));

        //$users = User::sortable()->paginate(10);

        return view('admin.users', compact('users'));
    }

    /**
     * Options view
     *
     * @return View|Factory|Application
     */
    public static function options(): View|Factory|Application
    {

        $options = Options::sortable()->paginate(config('PAGINATION_NUM'));

        return view('admin.options', compact('options'));
    }

}
