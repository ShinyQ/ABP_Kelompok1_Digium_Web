<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransactionItem extends Model
{
    use HasFactory;
    public $fillable = ['transaction_id', 'name', 'qr_code'];


    public function getQrCodeAttribute($value)
    {
        $svg = QrCode::size(100)->generate($value);
        $svg = base64_encode($svg);
        return $svg;
    }
}
