<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Gallery extends Model
{
    use HasFactory;

    public $fillable = ['museum_id', 'photo'];

    public function getPhotoAttribute($value){
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
