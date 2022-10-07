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
            $date = digits_to_english(request()->get($field));
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
    }

}
