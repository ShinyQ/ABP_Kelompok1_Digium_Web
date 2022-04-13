<?php

namespace App\Http\Controllers;

use App\Helper\ApiBuilder;
use App\Http\Requests\VerifyItem;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionItemController extends Controller
{
    public function show($code)
    {
        $data = explode("DIGIUM", $code);
        $itemId = $data[0];
        $item = TransactionItem::find($itemId);

        return ApiBuilder::apiRespond(200, $item);
    }


    public function verify(VerifyItem $request)
    {
        $data = explode("DIGIUM", $request->code);
        $itemId = $data[0];
        $txId = $data[1];

        $item = TransactionItem::find($itemId);

        if (!$item || $item->transaction_id != $txId) {
            return redirect('verification')->with('failed', 'Ticket tidak ditemukan');
        }

        $item->status = "Verified";
        $item->save();

        return redirect('verification')->with('success', 'Verifikasi tiket berhasil');
    }
}
