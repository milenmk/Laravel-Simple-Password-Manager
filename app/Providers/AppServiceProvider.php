<?php

declare(strict_types = 1);

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {

        if (!env('APP_IV')) {
            file_put_contents(base_path('.env'), "\n## DO NOT CHANGE OR REMOVE THIS\nAPP_IV=" . base64_encode(random_bytes(16)), FILE_APPEND);
        }

        $row = DB::select('select * from options');
        foreach ($row as $result) {
            config([$result->name => $result->value]);
        }

        view()->composer(
            'layouts.partials.language_switcher', static function ($view) {

            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        }
        );
    }
}
