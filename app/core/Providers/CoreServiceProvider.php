<?php

namespace Core\Providers;

use App\core\Service\UserService;
use App\core\Service\IUserService;
use App\core\Repositories\IUserRepository;
use Illuminate\Support\ServiceProvider;
use App\core\Repositories\UserRepository;

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
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserService::class, UserService::class);
    }
}
