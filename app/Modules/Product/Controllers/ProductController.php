<?php

namespace App\Modules\Product\Controllers;

use App\Exceptions\RecordNotFoundException;
use App\Http\Controllers\Controller;
use App\Modules\Product\Http\Resources\ProductResource;
use App\Modules\Product\Repos\ProductRepo;
use App\Modules\Product\Validations\ProductValidation;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $productValidation;
    protected $productResource;
    
    /**
     * __construct
     *
     * @param  ProductRepo       $producrRepo
     * @param  ProductValidation $productValidation
     * @return void
     */
    public function __construct(
        ProductRepo $productRepo,
        ProductValidation $productValidation
    ) {
        $this->productRepo = $productRepo;
        $this->productValidation = $productValidation;
    }
    
    /**
     * index
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->productRepo->paginate();
        $response = ProductResource::collection($products);

        return response()->json(['data' => $response]);
    }
    
    /**
     * view
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function view(int $id): JsonResponse
    {
        $product = $this->productRepo->findById($id);
        $response = new ProductResource($product);
        
        return response()->json(['data' => $response]);
    }
    
    /**
     * create
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $this->productValidation->create($request);
        $product = $this->productRepo->create($data);
        $response = new ProductResource($product);

        return response()->json(['data' => $response]);
    }
    
    /**
     * update
     *
     * @param  int     $id
     * @param  Request $request
     * @return void
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $data = $this->productValidation->update($request);
        $product = $this->productRepo->findById($id, false);

        if (empty($product)) {
            throw new RecordNotFoundException($id, 'Product');
        }

        $product = $this->productRepo->updateById($id, $data);
        $response = new ProductResource($product);

        return response()->json(['data' => $response]);
    }
    
    /**
     * delete
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $result = $this->productRepo->flagDeletedById($id);
        if (!$result) {
            throw new Exception("Can not delete record id $id");
        }

        return response()->json();
    }
}