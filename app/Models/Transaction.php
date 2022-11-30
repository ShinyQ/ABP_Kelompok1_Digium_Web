<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory;

    public $fillable = ['museum_id', 'qty', 'user_id', 'total_price', 'status', 'receipt'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function transaction_item(){
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }

    public function museum(){
        return $this->hasOne(Museum::class, 'id', 'museum_id')
            ->select('id', 'name', 'background', 'price');
    }

    public function getReceiptAttribute($value){
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
