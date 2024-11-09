<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'route_name', 'icon', 'order', 'group', 'parent_id'];

    // Parent-Child Relationship
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Navigation::class, 'parent_id')->orderBy('order');
    }
}
