<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
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

    public function store(GalleryRequest $request)
    {
        $data = $request->validated();
        $name = "AAA" . '.' . $data['photo']->getClientOriginalExtension();
        $data['photo']->move(public_path('assets/images/gallery/' . $request->museum_id . '/'), $name);
        $data['photo'] = $name;

        Gallery::create($data);
        return redirect("/museum/" . $request->museum_id . "/edit")->with('success', 'Data gallery berhasil ditambah');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect("/museum/" . $gallery->museum_id . "/edit")->with('success', 'Data gallery berhasil dihapus');
    }
}
