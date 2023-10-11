<?php

namespace Yudhatp\CheckDefaultPassword;

use Illuminate\Support\ServiceProvider;

class CheckDefaultPasswordServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/default-password.php' => config_path('default-password.php'),
        ], 'yudhatp-check-default-password-config');
    }
}
