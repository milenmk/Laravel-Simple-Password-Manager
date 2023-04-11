<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function array_key_exists;

/**
 * Language controller
 */
class LanguageController extends Controller
{

    /**
     * @param string $lang
     *
     * @return RedirectResponse
     */
    public function switchLang(string $lang): RedirectResponse
    {

        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        return Redirect::back();
    }

}
