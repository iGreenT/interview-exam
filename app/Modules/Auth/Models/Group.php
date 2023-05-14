<?php

namespace App\Modules\Auth\Models;

class Group
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'alias',
    ];
    
    /**
     * casts
     *
     * @var array<string>
     */
    protected $casts = [
        'name'  => 'string',
        'alias' => 'string',
    ];
}