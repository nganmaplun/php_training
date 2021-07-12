<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces;
use App\Services;

class AppServiceProvider extends ServiceProvider
{
    protected $appServices = [
        Interfaces\TimesheetServiceInterface::class => Services\TimesheetService::class,
        Interfaces\TaskServiceInterface::class => Services\TaskService::class,
        Interfaces\UserServiceInterface::class => Services\UserService::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->appServices as $interface => $service) {
            $this->app->bind($interface, $service);
        }    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
