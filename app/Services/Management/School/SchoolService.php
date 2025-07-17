<?php

namespace App\Services\Management\School;

use App\{
    Repositories\Contracts\Management\School\SchoolRepositoryInterface,
    Traits\ApiResponse,
    Traits\DbTransaction
};

class SchoolService
{
    use ApiResponse, DbTransaction;

    public function __construct(protected SchoolRepositoryInterface $schoolRepository) {}

    public function getAllSchool(): array
    {
        return $this->successResponse([
            'data' => $this->schoolRepository->getAllSchool()
        ], 'List sekolah berhasil diambil');
    }

    public function getById(string $schoolId): array
    {
        return $this->successResponse([
            'data' => $this->schoolRepository->getById($schoolId)
        ], 'Detail sekolah berhasil diambil');
    }

    public function create(array $data): array
    {
        $school = $this->runInTransaction(fn () => $this->schoolRepository->create($data));

        return $this->successResponse([
            'data' => $school
        ], 'Sekolah berhasil ditambahkan', 201);
    }

    public function update(string $schoolId, array $data): array
    {
        $school = $this->runInTransaction(fn () => $this->schoolRepository->update($schoolId, $data));

        return $this->successResponse([
            'data' => $school
        ], 'Sekolah berhasil diupdate');
    }

    public function delete(string $schoolId): array
    {
        $this->runInTransaction(fn () => $this->schoolRepository->delete($schoolId));

        return $this->successResponse([], 'Sekolah berhasil dihapus');
    }

}
