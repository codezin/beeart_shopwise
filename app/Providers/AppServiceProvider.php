<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dotenv\Dotenv;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $domain = request()->getHost();
        $envFile = '.env';

        if ($domain === 'andi.beeart.info') {
            $envFile = '.env_andi';
            //symlink(base_path("public/storage_andi"), base_path('public/storage'));
        }

        $dotenv = Dotenv::createImmutable(base_path(), $envFile);
        $dotenv->load();
        // if($_SERVER['HTTP_HOST'] == "jangseang.beeart.vn")
        // {
        //     $this->switchDatabase();
        // }

    }

    public function switchDatabase(){
        if (file_exists(base_path('platform/themes/jangseang/.env'))) {
            $env = parse_ini_file(base_path("platform/themes/jangseang/.env"), true, true);
            if (!empty($env)) {
                \Config::set('database.default', $env["DB_CONNECTION"]);
                \Config::set('database.connections.' . $env["DB_CONNECTION"] . '.host', $env["DB_HOST"]);
                \Config::set('database.connections.' . $env["DB_CONNECTION"] . '.port', $env["DB_PORT"]);
                \Config::set('database.connections.' . $env["DB_CONNECTION"] . '.database', $env["DB_CONNECTION"] == "sqlite" ? base_path($env["DB_DATABASE"]) : $env["DB_DATABASE"]);
                \Config::set('database.connections.' . $env["DB_CONNECTION"] . '.username', $env["DB_USERNAME"]);
                \Config::set('database.connections.' . $env["DB_CONNECTION"] . '.password', $env["DB_PASSWORD"]);
                \DB::purge($env["DB_CONNECTION"]);
                \DB::reconnect($env["DB_CONNECTION"]);
            }
        }
    }
}
