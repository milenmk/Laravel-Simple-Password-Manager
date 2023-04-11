<?php

namespace App\Http\Controllers;

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

        return view('adminboard');
    }

    /**
     * Users view
     *
     * @return View|Factory|Application
     */
    public static function users(): View|Factory|Application
    {

        return view('admin.users');
    }

    /**
     * Options view
     *
     * @return View|Factory|Application
     */
    public static function options(): View|Factory|Application
    {

        return view('admin.options');
    }

}
