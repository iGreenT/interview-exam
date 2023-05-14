<?php

namespace App\Modules\Auth\Models;

class Permission
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