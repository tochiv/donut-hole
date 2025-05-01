<?php

declare(strict_types=1);

namespace App\Repositories\Department;

use App\Models\Department;
use App\Repositories\Contracts\DepartmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function all(): Collection
    {
        return Department::withCount('employees')
            ->withMax('employees', 'salary')
            ->get();
    }

    public function store(array $data): Department
    {
        return Department::create($data);
    }

    public function findById(int $id): ?Department
    {
        return Department::find($id);
    }

    public function update(array $data, Department $department): Department
    {
        $department->update($data);
        return $department->fresh();
    }

    public function destroy(Department $department): void
    {
        $department->delete();
    }
}
