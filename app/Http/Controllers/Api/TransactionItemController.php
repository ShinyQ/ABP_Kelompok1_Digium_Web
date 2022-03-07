<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\transactionItem;
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
     * @param  \App\Models\transactionItem  $transaction_item
     * @return \Illuminate\Http\Response
     */
    public function show(transactionItem $transaction_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transactionItem  $transaction_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transactionItem $transaction_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transactionItem  $transaction_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(transactionItem $transaction_item)
    {
        //
    }
}
