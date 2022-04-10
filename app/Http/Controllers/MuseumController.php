<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function index()
    {
        $title = 'Halaman Museum';
        $museums = Museum::get();

        return view('museum.index', compact('title', 'museums'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $museum = Museum::findOrFail($id);
        return response()->json(['data' => $museum]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
