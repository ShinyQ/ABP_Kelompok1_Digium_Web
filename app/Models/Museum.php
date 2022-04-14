<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    use HasFactory;

    public $fillable =
        [
            'name', 'address', 'price',
            'background', 'panorama', 'description',
            'phone', 'year_built', 'latitude', 'longitude'
        ];

    public function gallery(){
        return $this->hasMany(Gallery::class, 'museum_id', 'id');
    }
}