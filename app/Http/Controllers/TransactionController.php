<?php

namespace App\Http\Controllers;

use App\Models\TransactionItem;
use App\Models\Transaction;
use GuzzleHttp\Client;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class TransactionController extends Controller
{
    public function index()
    {
        $title = 'Halaman Transaksi';
        $transactions = Transaction::with('user', 'transaction_item')->latest()->get();

        return view('transaction.index', compact('title', 'transactions'));
    }

    public function show($id)
    {
        $title = 'Transaction ID #'. $id;

        $data = Cache::remember('transaction:'.$id,300, function () use ($id){
            return TransactionItem::where('transaction_id',$id)->get();
        });

        return view('transaction.show', compact('title','data'));
    }

    public function update($id)
    {
        Cache::forget('transaction:'.$id);
        Cache::forget('transactionDetail:'.$id);

        Transaction::where('id', $id)->update(['status' => 'Paid']);

        $transaction_item = TransactionItem::where('transaction_id', $id)->get();

        foreach ($transaction_item as $item){
            $name = $id.'DIGIUM'.$item->id.'.png';

            $client = new Client();
            $client->request('GET', 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='. $name, ['sink' => $name]);

            $imageName=time()."-".$name;
            $filePath = 'transactions/' . $imageName;
            Storage::disk('s3')->put($filePath, file_get_contents($name));
            File::delete($name);
            TransactionItem::where('id', $item->id)->update(['qr_code' => $name, 'status'=> 'Paid']);
        }

        return redirect()->back()->with('success', 'Sukses verifikasi transaksi');
    }

    public function verify()
    {
        $title = "Transaction Verification";
        return view('transaction.verify', compact('title'));
    }
}
