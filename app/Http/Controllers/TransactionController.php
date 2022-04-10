<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionItem;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $title = 'Halaman Transaksi';
        $transactions = Transaction::with('user', 'transaction_item')->get();

        return view('transaction.index', compact('title', 'transactions'));
    }

    public function show($id)
    {
        $data = TransactionItem::where('transaction_id',$id)->get();
        $title = 'Transaction Item';

        return view('transaction.show', compact('title','data'));
    }

    public function update(Request $request, $id)
    {
        //
    }
<<<<<<< HEAD
=======

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

    public function detail(Request $request)
    {
        $data = TransactionItem::where('transaction_id', $request->id)->get();
        $title = 'Transaction Item';
        $ret = array('title', 'data');
        // return $data[0]->name;
        return view('transaction.detail', compact($ret));
    }

    public function verify(Request $request)
    {
        $title = "Transaction Verification";
        return view('transaction.verify', compact('title'));
    }
>>>>>>> 3f29c545865378a300f01d7d084ef5d793319e25
}
