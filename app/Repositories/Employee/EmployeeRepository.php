<?php

declare(strict_types=1);

namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all(): LengthAwarePaginator
    {
        return Employee::paginate(5);
    }

    public function store(array $data): Employee
    {
        return DB::transaction(function () use ($data) {
            $employee = Employee::create($data);
            $employee->departments()->sync($data['departments']);
            return $employee;
        });
    }

    public function findById(int $id): ?Employee
    {
        return Employee::find($id);
    }

    public function update(array $data, Employee $employee): Employee
    {
        return DB::transaction(function () use ($data, $employee) {
            $employee->update($data);
            $employee->departments()->sync($data['departments']);
            return $employee->fresh();
        });
    }

    public function destroy(Employee $employee): void
    {
        $employee->delete();
    }
}
