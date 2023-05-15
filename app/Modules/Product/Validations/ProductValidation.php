<?php

namespace App\Modules\Product\Validations;

use App\Validations\Appvalidation;
use Illuminate\Http\Request;

class ProductValidation extends Appvalidation
{    
    /**
     * create
     *
     * @param  Request $request
     * @return array
     */
    public function create(Request $request): array
    {
        $rules = [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'short_code'    => 'nullable|string|max:4',
            'category_id'   => 'required|integer|exists:categories,id'
        ];

        return $this->validate($request, $rules);
    }
    
    /**
     * update
     *
     * @param  Request $request
     * @return array
     */
    public function update(Request $request): array
    {
        $rules = [
            'name'          => 'nullable|string',
            'description'   => 'nullable|string',
            'short_code'    => 'nullable|string|max:4',
            'category_id'   => 'nullable|integer|exists:categories,id'
        ];

        return $this->validate($request, $rules);
    }
}