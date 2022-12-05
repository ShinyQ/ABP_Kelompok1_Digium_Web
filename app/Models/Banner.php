<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    public $fillable = ['name', 'image', 'link'];

    public function getImageAttribute($value){
        if (empty($value)){
            return "";
        }
        if(str_starts_with($value, 'http')) {
            return $value;
        }
        return Storage::disk('s3')->temporaryUrl(
            $value, Carbon::now()->addMinutes(60)
        );
    }
}
