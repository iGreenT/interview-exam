<?php

namespace App\Modules\Product\Repos;

use App\Modules\Product\Models\Product;
use App\Repos\RepoCRUD;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepo
{
    use RepoCRUD;

    protected $model;
    
    /**
     * __construct
     *
     * @param  Product $product
     * @return void
     */
    public function __construct(
        Product $product
    ) {
        $this->model = $product;
    }

    public function paginate(?int $limit = 20): LengthAwarePaginator
    {
        return $this->model->paginate($limit);
    }
}