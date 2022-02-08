<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Event\EventRepository;
use App\Repositories\Event\EventRepositoryInterface;
use App\Repositories\EventType\EventTypeRepository;
use App\Repositories\EventType\EventTypeRepositoryInterface;
use App\Repositories\Location\LocationRepository;
use App\Repositories\Location\LocationRepositoryInterface;
use App\Repositories\Match\MatchRepository;
use App\Repositories\Match\MatchRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserInterest\UserInterestRepository;
use App\Repositories\UserInterest\UserInterestRepositoryInterface;
use App\Repositories\UserMedia\UserMediaRepository;
use App\Repositories\UserMedia\UserMediaRepositoryInterface;
use App\Repositories\UserParameter\UserParameterRepository;
use App\Repositories\UserParameter\UserParameterRepositoryInterface;
use App\Repositories\UserSetting\UserSettingRepository;
use App\Repositories\UserSetting\UserSettingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventTypeRepositoryInterface::class, EventTypeRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(MatchRepositoryInterface::class, MatchRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserInterestRepositoryInterface::class, UserInterestRepository::class);
        $this->app->bind(UserMediaRepositoryInterface::class, UserMediaRepository::class);
        $this->app->bind(UserParameterRepositoryInterface::class, UserParameterRepository::class);
        $this->app->bind(UserSettingRepositoryInterface::class, UserSettingRepository::class);
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
