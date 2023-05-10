<?php

declare(strict_types = 1);

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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

        if (!config('app.APP_IV') && !env('APP_IV')) {
            Artisan::call('config:clear');
            file_put_contents(base_path('.env'), "\n## DO NOT CHANGE OR REMOVE THIS\nAPP_IV=" . base64_encode(random_bytes(16)), FILE_APPEND);
            Artisan::call('config:cache');
        } elseif (!config('app.APP_IV') && env('APP_IV')) {
            Artisan::call('config:cache');
        }

        if (Schema::hasTable('options')) {
            $row = DB::select('select * from options');
            foreach ($row as $result) {
                config([$result->name => $result->value]);
            }
        }
    }

}
