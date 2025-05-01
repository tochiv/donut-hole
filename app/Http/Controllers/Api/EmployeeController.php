<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index(): JsonResponse
    {
        $employees = $this->employeeRepository->all();

        return response()->json([
            'data' => EmployeeResource::collection($employees),
        ]);
    }

    public function store(EmployeeRequest $request): JsonResponse
    {
        $employee = $this->employeeRepository->store($request->validated());

        return response()->json([
            'data' => new EmployeeResource($employee),
        ], 201);
    }

    public function update(EmployeeRequest $request, int $id): JsonResponse
    {
        $employee = $this->employeeRepository->findById($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found',
            ], 404);
        }

        $updatedEmployee = $this->employeeRepository
            ->update($request->validated(), $employee);

        return response()->json([
            'data' => new EmployeeResource($updatedEmployee),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $employee = $this->employeeRepository->findById($id);

        if (!$employee) {
            return response()->json([
                'message' => 'Employee not found',
            ], 404);
        }

        $this->employeeRepository->destroy($employee);

        return response()->json([
            'message' => 'Employee deleted successfully',
        ]);
    }
}
