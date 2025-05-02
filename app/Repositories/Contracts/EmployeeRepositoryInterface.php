<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmployeeRepositoryInterface
{
    public function all(): LengthAwarePaginator;

    public function store(array $data): Employee;

    public function update(array $data, Employee $employee): Employee;

    public function findById(int $id): ?Employee;

    public function destroy(Employee $employee): void;
}
