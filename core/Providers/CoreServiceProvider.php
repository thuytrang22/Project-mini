<?php

namespace core\Providers;

use core\Repositories\IStudentRepository;
use core\Repositories\StudentRepository;
use core\Service\IStudentService;
use core\Service\StudentService;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
        $this->app->bind(IStudentService::class, StudentService::class);

    }
}
