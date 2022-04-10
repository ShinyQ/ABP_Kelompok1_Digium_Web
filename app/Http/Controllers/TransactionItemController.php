<?php

namespace App\Http\Controllers;

use App\Helper\ApiBuilder;
use App\Http\Requests\VerifyItem;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $data = explode("DIGIUM", $code);
        $itemId = $data[0];
        $item = TransactionItem::find($itemId);
        return ApiBuilder::apiRespond(200, $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
