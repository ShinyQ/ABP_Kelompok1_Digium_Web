<?php

namespace App\Http\Controllers;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(){
        $title = 'Banner Museum';
        $banners = Banner::get();
        return view('banner.index', compact('banners', 'title'));
    }

    public function create(){
        $title = "Halaman Tambah Banner";
        return view('banner.add', compact('title'));

    }

    public function show($id)
    {
        $banner = Cache::remember('bannerDetail:'.$id,300, function () use ($id){
            return Banner::findOrFail($id);
        });
        return response()->json(['data' => $banner]);
    }

    public function edit($id)
    {
        Cache::forget('banner:'.$id);
        Cache::forget('bannerDetail:'.$id);

        $title = 'Edit Banner';

        $data = Banner::find($id);

        return view('banner.update', compact(
            'title', 'data'
        ));
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
        return redirect('/banner')->with('success', 'Data banner berhasil ditambahkan');
    }

    public function update(BannerRequest $request, $id){
        Cache::forget('banner:'.$id);
        Cache::forget('bannerDetail:'.$id);

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

    public function destroy($id){
        Banner::findOrFail($id)->delete();
        return redirect('/banner')->with('success', 'Data banner berhasil dihapus');
    }
}
