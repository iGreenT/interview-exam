<?php

namespace App\Repos;

use Illuminate\Database\Eloquent\Model;

 trait RepoCRUD
 {    
    /**
     * findById
     *
     * @param  int  $id
     * @param  bool $strict
     * @return Model|null
     */
    public function findById(int $id, bool $strict = true): ?Model
    {
        if ($strict) {
            return $this->model->findOrFail($id);
        }

        return $this->model->where('id', $id)->first();
    }
    
    /**
     * Create record
     *
     * @param  array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    
    /**
     * Update by record id
     *
     * @param  int   $id
     * @param  array $data
     * @return Model
     */
    public function updateById(int $id, array $data): Model
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);

        return $record;
    }
    
    /**
     * Update data at many row (by ids) in one time
     *
     * @param  array<int> $ids
     * @param  array      $data
     * @return void
     */
    public function updateByIds(array $ids, array $data): void
    {
        $this->model->whereIn('id', $ids)->update($data);
    }
    
    /**
     * Deleted by record id
     *
     * @param  int $id
     * @return bool
     */
    public function deletedById(int $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
    
    /**
     * flag deleted by id
     *
     * @param  mixed $id
     * @return bool
     */
    public function flagDeletedById(int $id): bool
    {
        return $this->model->where('id', $id)->update('deleted', true);
    }
 }