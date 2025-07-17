<?php

namespace App\Repositories\Eloquent\Management\School;

use App\{
    Repositories\BaseRepo
};
use App\Models\Management\School\School;
use App\Repositories\Contracts\Management\School\SchoolRepositoryInterface;
use App\Traits\DbTransaction;


class SchoolRepository extends BaseRepo implements SchoolRepositoryInterface
{
    use DbTransaction;

    public function __construct(School $model)
    {
        parent::__construct($model);
    }

    public function getAllSchool()
    {
        return $this->model->all();
    }

    public function getById(string $schoolId)
    {
        return $this->model->findOrFail($schoolId);
    }

    public function create(array $data): School
    {
        return $this->model->create($data);
    }

    public function update(string $schoolId, array $data): ?School
    {
        $school = $this->model->findOrFail($schoolId);
        $school->update($data);
        return $school;
    }

    public function delete(string $schoolId): bool
    {
        $school = $this->model->findOrFail($schoolId);
        return $school->delete();
    }

}
