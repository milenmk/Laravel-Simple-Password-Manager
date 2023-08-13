<?php

declare(strict_types = 1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use function array_key_exists;

/**
 * Localization middleware
 */
class Localization
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next): mixed
    {

        if (isset(auth()->user()->language) && auth()->user()->language && array_key_exists(auth()->user()->language, Config::get('languages'))) {
            Session::put('applocale', auth()->user()->language);
        }

        if (session()->has('applocale') && array_key_exists(session()->get('applocale'), config('languages'))) {
            App::setLocale(session()->get('applocale'));
        } else { // This is optional as Laravel will automatically set the fallback language if there is
            // none specified
            App::setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }

}
