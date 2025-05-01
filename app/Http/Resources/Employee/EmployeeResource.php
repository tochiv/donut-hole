<?php

declare(strict_types=1);

namespace App\Http\Resources\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => "$this->name $this->surname $this->patronymic",
            'gender' => $this->gender,
            'salary' => $this->salary
        ];
    }
}
