<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nrc extends Model
{
    protected $fillable = [
        'name_en', 'name_mm', 'nrc_code'
    ];
}
