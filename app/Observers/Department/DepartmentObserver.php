<?php

declare(strict_types=1);

namespace App\Observers\Department;

use App\Exceptions\Department\DepartmentHasEmployeeException;
use App\Models\Department;

class DepartmentObserver
{
    public function deleting(Department $department): void
    {
        if ($department->employees()->exists()) {
            throw new DepartmentHasEmployeeException();
        }
    }
}
