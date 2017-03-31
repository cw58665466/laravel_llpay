<?php

namespace Junjiesang\Llpay;

use Illuminate\Support\ServiceProvider;

class LianLianPayProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('llpay',function(){
            $app = new LianLianPay(config('llpay'));
            return $app;
        });
    }
}
