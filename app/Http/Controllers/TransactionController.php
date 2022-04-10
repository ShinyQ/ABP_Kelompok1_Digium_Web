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
}
