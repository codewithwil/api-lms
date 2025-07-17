<?php

namespace App\Repositories\Contracts\Management\School;


interface SchoolRepositoryInterface
{
    public function getAllSchool();
    public function getById(string $schoolId);
    public function create(array $data);
    public function update(string $schoolId, array $data);
    public function delete(string $schoolId);

}

