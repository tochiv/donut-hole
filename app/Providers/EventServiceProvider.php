<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Department;
use App\Observers\Department\DepartmentObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        Department::observe(DepartmentObserver::class);
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
