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
        $title = 'Add Museum';
        $method = 'post';
        $action = 'museum';
        return view('museum.add', compact('title', 'method', 'action'));
    }

    public function store(Request $request)
    {
        $museum = Museum::create([
            'name' => $request->name,
            'background' => $request->background,
            'panorama' => $request->panorama,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'year_built' => $request->year_built,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, 
            'price' => $request->price,
        ]);
        return redirect('/museum')->with('msg', 'Data museum berhasil ditambahkan');

    }

    public function show($id)
    {
        $museum = Museum::findOrFail($id);
        return response()->json(['data' => $museum]);
    }

    public function edit($id)
    {
        $title = 'Edit Museum';
        $data = Museum::find($id);
        return view('museum.update', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        Museum::where('id', $id)
        ->update([
            'name' => $request->name,
            'background' => $request->background,
            'panorama' => $request->panorama,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'year_built' => $request->year_built,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, 
            'price' => $request->price,
        ]);
        return redirect('/museum')->with('msg', 'Data museum berhasil diperbarui');
    }

    public function destroy($id)
    {
        Museum::destroy($id);
        return redirect('/museum')->with('msg', 'Data museum berhasil dihapus');
    }
}