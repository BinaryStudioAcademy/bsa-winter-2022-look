<?php
declare(strict_types=1);

namespace App\Providers;

use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
