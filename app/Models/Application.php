<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'description', 'icon', 'type', 'status'];


    public function scopeDefaultApps($query)
    {
        return $query->where('type', 'default');
    }

    public function scopeModuleApps($query)
    {
        return $query->where('type', 'module');
    }

    public function scopePackageApps($query)
    {
        return $query->where('type', 'package');
    }

    public function scopeAddonApps($query)
    {
        return $query->where('type', 'add-on');
    }
}
