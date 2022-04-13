<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function landing(){
        $museums = Museum::inRandomOrder()->limit(15)->get();
        return view('welcome', compact('museums'));
    }

    public function index(){
        $title = "Halaman Dashboard";

        $get_museum = [];
        $get_total = [];

        $get_top_museum = Transaction::selectRaw("museum_id, SUM(museum_id) as total")
            ->with('museum')
            ->groupBy('museum_id')
            ->get()
            ->sortByDesc('total')
            ->take(3)
            ->toArray();

        foreach ($get_top_museum as $museum){
            $get_total[] = $museum['total'];
            $get_museum[] = substr(trim(str_replace(
                "Museum", "", $museum['museum']['name'])), 0, 15
            );
        }

        $get_date = [];
        $get_transaction = [];

        $daily_transaction = Transaction::selectRaw('DATE(created_at) as date, count(*) as total')
            ->groupBy('date')
            ->get();

        foreach ($daily_transaction as $transaction){
            $get_date[] = $transaction['date'];
            $get_transaction[] =  $transaction['total'];
        }

        $transaction = Transaction::where('status', 'Waiting Verification')
            ->latest()
            ->get();

        return view('dashboard', compact(
            'title', 'transaction',
            'get_museum', 'get_total',
            'get_date', 'get_transaction'
        ));
    }
}
