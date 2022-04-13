<?php

namespace App\Http\Controllers;

use App\Models\TransactionItem;
use App\Models\Transaction;
use GuzzleHttp\Client;
use File;

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
        $title = 'Transaction ID #'. $id;
        $data = TransactionItem::where('transaction_id',$id)->get();

        return view('transaction.show', compact('title','data'));
    }

    public function update($id)
    {
        Transaction::where('id', $id)->update(['status' => 'Paid']);

        $transaction_item = TransactionItem::where('transaction_id', $id)->get();

        foreach ($transaction_item as $item){
            $name = $id.'DIGIUM'.$item->id.'.png';
            $path = 'assets/images/transaction/'. $id;

            if (!is_dir('assets/images/transaction/'. $id)) {
                mkdir($path, 0777, true);
            }

            $client = new Client();
            $client->request('GET', 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='. $name, ['sink' => $name]);

            File::move(public_path($name), public_path($path.'/'. $name));
            TransactionItem::where('id', $item->id)->update(['qr_code' => $name]);
        }

        return redirect()->back()->with('success', 'Sukses verifikasi transaksi');
    }

    public function verify()
    {
        $title = "Transaction Verification";
        return view('transaction.verify', compact('title'));
    }
}
