<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'description',
        'short_code',
        'category_id',
        'price',
    ];
    
    /**
     * casts
     *
     * @var array<string>
     */
    protected $casts = [
        'name'          => 'string',
        'description'   => 'string',
        'short_code'    => 'string',
        'category_id'   => 'integer',
        'price'         => 'float',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}