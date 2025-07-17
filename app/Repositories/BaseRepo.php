<?php

namespace App\Repositories;

use Illuminate\{
    Database\Eloquent\Model,
    Database\Eloquent\Collection
};

class BaseRepo
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): ?Model
    {
        $record = $this->find($id);
        if ($record) {
            $record->update($data);
        }
        return $record;
    }

    public function delete(string $id): bool
    {
        $record = $this->find($id);
        return $record ? $record->delete() : false;
    }

    public function where(string $column, $value): Collection
    {
        return $this->model->where($column, $value)->get();
    }

    public function firstWhere(string $column, $value): ?Model
    {
        return $this->model->where($column, $value)->first();
    }

    public function whereMany(array $conditions): Collection
    {
        $query = $this->model->query();
        foreach ($conditions as $column => $value) {
            $query->where($column, $value);
        }
        return $query->get();
    }

    public function paginate(int $perPage = 20)
    {
        return $this->model->paginate($perPage);
    }
}
