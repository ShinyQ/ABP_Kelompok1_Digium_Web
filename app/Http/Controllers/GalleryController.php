<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $file = $data['photo'];
        $imageName=time().$file->getClientOriginalName();
        $filePath = 'museums/' . $request['museum_id'] . "/" . "galleries/" . $imageName;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $data['photo'] = $filePath;
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
