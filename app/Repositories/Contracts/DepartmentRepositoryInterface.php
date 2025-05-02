<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Department;
use Illuminate\Pagination\LengthAwarePaginator;

interface DepartmentRepositoryInterface
{
    public function all(): LengthAwarePaginator;

    public function store(array $data): Department;

    public function update(array $data, Department $department): Department;

    public function findById(int $id): ?Department;

    public function destroy(Department $department): void;
}
