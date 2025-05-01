<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Contracts\DepartmentRepositoryInterface;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Employee\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );
        $this->app->bind(
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class
        );
    }
}
