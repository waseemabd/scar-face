<?php

namespace App\Providers;




use App\Http\IRepositories\ICurrencyRepository;
use App\Http\IRepositories\IFeatureRepository;
use App\Http\IRepositories\IImageRepository;
use App\Http\IRepositories\IPartnerRepository;
use App\Http\IRepositories\IPlanRepository;
use App\Http\IRepositories\ISettingRepository;
use App\Http\IRepositories\IUserRepository;
use App\Http\Repository\CurrencyRepository;
use App\Http\Repository\FeatureRepository;
use App\Http\Repository\ImageRepository;
use App\Http\Repository\PartnerRepository;
use App\Http\Repository\PlanRepository;
use App\Http\Repository\SettingRepository;
use App\Http\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ICurrencyRepository::class, CurrencyRepository::class);
        $this->app->bind(IFeatureRepository::class, FeatureRepository::class);
        $this->app->bind(IImageRepository::class, ImageRepository::class);
        $this->app->bind(IPartnerRepository::class, PartnerRepository::class);
        $this->app->bind(IPlanRepository::class, PlanRepository::class);
        $this->app->bind(ISettingRepository::class, SettingRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
