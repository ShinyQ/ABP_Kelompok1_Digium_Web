<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Museum extends Model
{
    use HasFactory;

    public $fillable =
        [
            'name', 'address', 'price', 'province', 'city',
            'background', 'panorama', 'description',
            'phone', 'year_built', 'latitude', 'longitude'
        ];

    public function gallery(){
        return $this->hasMany(Gallery::class, 'museum_id', 'id');
    }

    public function getBackgroundAttribute($value){
        if (empty($value)){
            return "";
        }
        if(substr($value, 0, 4) == 'http') {
            return $value;
        }
        return Storage::disk('s3')->temporaryUrl(
            $value, Carbon::now()->addMinutes(60)
        );
    }
}
