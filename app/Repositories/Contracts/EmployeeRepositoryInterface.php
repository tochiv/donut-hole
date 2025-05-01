<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryInterface
{
    public function all(): Collection;

    public function store(array $data): Employee;

    public function update(array $data, Employee $employee): Employee;

    public function findById(int $id): ?Employee;

    public function destroy(Employee $employee): void;
}
