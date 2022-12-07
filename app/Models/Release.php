<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Release extends Model
{
    use HasFactory;

    public $fillable = ['path'];

    public function getPathAttribute($value){
        return Storage::disk('s3')->temporaryUrl(
            $value, Carbon::now()->addMinutes(60)
        );
    }
}
