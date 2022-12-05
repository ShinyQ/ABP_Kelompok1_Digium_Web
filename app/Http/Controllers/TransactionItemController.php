<?php

namespace App\Http\Controllers;

use App\Helper\ApiBuilder;
use App\Http\Requests\VerifyItem;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TransactionItemController extends Controller
{
    public function show($code)
    {
        $data = explode("DIGIUM", $code);
        $itemId = $data[0];
        $item = Cache::remember('transactionItem:'.$itemId,300, function () use ($itemId){
            return TransactionItem::find($itemId);
        });

        return ApiBuilder::apiRespond(200, $item);
    }


    public function verify(VerifyItem $request)
    {

        $data = explode("DIGIUM", $request->code);
        $itemId = $data[0];
        $txId = $data[1];
        Cache::forget('transactionItem:'.$itemId);
        Cache::forget('transactionDetail:'.$itemId);

        $item = TransactionItem::find($itemId);

        if (!$item || $item->transaction_id != $txId) {
            return redirect('verification')->with('failed', 'Ticket tidak ditemukan');
        }

        $item->status = "Verified";
        $item->save();

        return redirect('verification')->with('success', 'Verifikasi tiket berhasil');
    }
}
