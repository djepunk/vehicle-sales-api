<?php

namespace App\Providers;

use App\Repositories\KendaraanRepository;
use App\Repositories\KendaraanRepositoryInterface;
use App\Repositories\MobilRepository;
use App\Repositories\MobilRepositoryInterface;
use App\Repositories\MotorRepository;
use App\Repositories\MotorRepositoryInterface;
use App\Repositories\PenjualanRepository;
use App\Repositories\PenjualanRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KendaraanRepositoryInterface::class, KendaraanRepository::class);
        $this->app->bind(MotorRepositoryInterface::class, MotorRepository::class);
        $this->app->bind(MobilRepositoryInterface::class, MobilRepository::class);
        $this->app->bind(PenjualanRepositoryInterface::class, PenjualanRepository::class);
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
