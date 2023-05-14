<?php

namespace App\Repos;

 trait RepoCRUD
 {    
    /**
     * findById
     *
     * @param  int  $id
     * @param  bool $strict
     * @return void
     */
    public function findById(int $id, bool $strict = true)
    {
        if ($strict) {
            return $this->model->findOrFail($id);
        }

        return $this->model->where('id', $id)->first();
    }
 }