<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\DepartmentRequest;
use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\Department\GetDepartmentEmployeesResource;
use App\Repositories\Contracts\DepartmentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index(): JsonResponse
    {
        $departments = $this->departmentRepository->all();

        return response()->json([
            'data' => GetDepartmentEmployeesResource::collection($departments)
        ]);
    }

    public function store(DepartmentRequest $request): JsonResponse
    {
        $department = $this->departmentRepository->store($request->validated());

        return response()->json([
            new DepartmentResource($department)
        ], 201);
    }

    public function update(DepartmentRequest $request, int $id): JsonResponse
    {
        $department = $this->departmentRepository->findById($id);

        if (!$department) {
            return response()->json([
                'message' => 'Department not found'
            ], 404);
        }

        $updatedDepartment = $this->departmentRepository
            ->update($request->validated(), $department);

        return response()->json([
            'data' => new DepartmentResource($updatedDepartment)
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $department = $this->departmentRepository->findById($id);

        if (!$department) {
            return response()->json([
                'message' => 'Department not found'
            ], 404);
        }

        $this->departmentRepository->destroy($department);

        return response()->json([
            'message' => 'Department deleted successfully'
        ]);
    }
}
