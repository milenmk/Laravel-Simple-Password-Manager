<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{

    /**
     * Show all domains
     *
     * @return Application|Factory|View
     */
    public static function index(): View|Factory|Application
    {

        return view('adminboard');
    }

}
