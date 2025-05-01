<?php

declare(strict_types=1);

namespace App\Http\Resources\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDepartmentEmployeesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'employees_count' => $this->employees_count,
            'max_salary' => $this->employees_max_salary
        ];
    }
}
