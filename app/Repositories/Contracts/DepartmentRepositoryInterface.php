<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

interface DepartmentRepositoryInterface
{
    public function all(): Collection;

    public function store(array $data): Department;

    public function update(array $data, Department $department): Department;

    public function findById(int $id): ?Department;

    public function destroy(Department $department): void;
}
