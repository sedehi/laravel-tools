<?php

namespace Sedehi\LaravelTools;

use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class LaravelToolsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {

        Request::macro('queryHash', function () {
            $data = request()->query();
            asort($data);
            return md5(serialize($data));
        });

        Request::macro('jalaliToCarbon', function ($field, $dateDivider = '-',$timeDivider = ':',$separator = ' ') {
            if (request()->isNotFilled($field)) {
                return null;
            }
            $date = digitsToEnglish(request()->get($field));
            $date = explode($separator, $date);
            $hour = $minute = $second = 0;
            if(count($date)  == 2){
                $time = end($date);
                if (null !== $time) {
                    $time = explode($timeDivider, $time);
                    list($hour, $minute) = $time;
                }
            }
            list($year, $month, $day) = explode($dateDivider,head($date));
            return Verta::createJalali($year,$month,$day,$hour,$minute,$second);
        });


        Carbon::macro('toJalali', function () {
            return verta(self::this());
        });


        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-tools.php', 'laravel-tools');

        $this->app->singleton('laravel-tools', function ($app) {
            return new LaravelTools;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-tools'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-tools.php' => config_path('laravel-tools.php'),
        ], 'laravel-tools.config');
    }
}
