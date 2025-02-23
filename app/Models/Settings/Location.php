<?php
namespace App\Models\Settings;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'parent_id',
        'location_type',
        'status',
        'address',
        'latitude',
        'longitude',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Define parent-child relationship
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'default_location_id');
    }

}
