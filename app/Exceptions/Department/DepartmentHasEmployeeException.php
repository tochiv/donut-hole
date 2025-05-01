<?php

declare(strict_types=1);

namespace App\Exceptions\Department;

use Exception;

class DepartmentHasEmployeeException extends Exception
{
    public function __construct()
    {
        parent::__construct('You cant delete a department that has employees!', 422);
    }
}
