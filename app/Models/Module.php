<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DashboardAble;

class Module extends Model
{
    use DashboardAble;
    use HasFactory;

    protected $fillable = ['name', 'description', 'repository', 'status', 'branch'];

}
