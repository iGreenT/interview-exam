<?php

namespace App\Modules\Auth\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupPermission
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, int>
     */
    protected $fillable = [
        'group_id',
        'permission_id',
        'is_enable'
    ];
    
    /**
     * casts
     *
     * @var array<string>
     */
    protected $casts = [
        'group_id'      => 'integer',
        'permission_id' => 'integer',
        'is_enable'     => 'boolean',
    ];

    public function group(): HasMany
    {
        return $this->hasMany(Group::class);
    }
}