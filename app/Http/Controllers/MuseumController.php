<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuseumRequest;
use App\Models\Museum;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function index()
    {
        $title = 'Halaman Museum';
        $museums = Museum::latest()->get();

        return view('museum.index', compact('title', 'museums'));
    }

    public function create()
    {
        $title = 'Tambah Data Museum';
        $method = 'post';
        $action = 'museum';
        return view('museum.add', compact('title', 'method', 'action'));
    }

    public function store(MuseumRequest $request)
    {
        $data = $request->validated();
        $coordinate = explode(",", $data['coordinate']);

        $data['latitude'] = $coordinate[0];
        $data['longitude'] = $coordinate[1];
        unset($data['coordinate']);

        $name = $data['name'].'.'.$data['background']->getClientOriginalExtension();
        $data['background']->move(public_path('assets/images/museum'), $name);
        $data['background'] = $name;

        Museum::create($data);
        return redirect('/museum')->with('success', 'Data museum berhasil ditambahkan');
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

        $coordinate = [(float) $data->longitude, (float) $data->latitude];
        $coordinate_str = $data->latitude.','.$data->longitude;

        return view('museum.update', compact(
            'title', 'data', 'coordinate', 'coordinate_str'
        ));
    }

    public function update(MuseumRequest $request, $id)
    {
        $data = $request->validated();
        $coordinate = explode(",", $data['coordinate']);

        $data['latitude'] = $coordinate[0];
        $data['longitude'] = $coordinate[1];
        unset($data['coordinate']);

        if(isset($data['background'])) {
            $name = $data['name'] . '.' . $data['background']->getClientOriginalExtension();
            $data['background']->move(public_path('assets/images/museum'), $name);
            $data['background'] = $name;
        }

        Museum::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Data museum berhasil di update');
    }

    public function destroy($id)
    {
        Museum::destroy($id);
        return redirect('/museum')->with('success', 'Data museum berhasil dihapus');
    }
}
