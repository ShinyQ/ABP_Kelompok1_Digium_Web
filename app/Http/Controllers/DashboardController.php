<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = "Halaman Dashboard";
        return view('dashboard', compact('title'));
    }
}
