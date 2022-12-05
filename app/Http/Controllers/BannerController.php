<?php

namespace App\Http\Controllers;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $data = Banner::get();
        return view('banner', compact('data'));
    }

    public function store(BannerRequest $request)
    {
        $data = $request->validated();

        $file = $data['image'];
        $imageName = time() . $file->getClientOriginalName();
        $filePath = 'banners/' . $imageName;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $data['image'] = $filePath;

        Banner::create($data);
        return redirect('/museum')->with('success', 'Data banner berhasil ditambahkan');
    }

    public function update(BannerRequest $request, $id){
        $data = $request->validated();

        if(isset($data['image'])) {
            $file = $data['image'];
            $imageName = time() . $file->getClientOriginalName();
            $filePath = 'banners/'. $id . "/" . $imageName;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
            $data['image'] = $filePath;
        }

        Banner::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Data banner berhasil di update');
    }

    public function delete($id){
        Banner::findOrFail($id)->id();
        return redirect('/banner')->with('success', 'Data banner berhasil dihapus');
    }
}
