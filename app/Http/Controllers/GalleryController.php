<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create(Request $request)
    {
        $title = 'Tambah Galeri Museum';

        $gallery = Gallery::where('museum_id', $request->museum_id)->get();
        $museum_id = $request->museum_id;

        return view('gallery.create', compact('title', 'museum_id', 'gallery'));
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
