<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Museum;
use Exception;
use Api;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\GetNearbyMuseumsRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class MuseumController extends Controller
{
    private $response, $code;

    public function __construct()
    {
        $this->code = 200;
        $this->response = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            $response = Museum::query();

            if($request->has('search')){
                $response = $response->where('name', 'like', '%'. $request->query('search'). '%');
            }

            if($request->has('top')) {
                $response = $response->take(3);
            }

            if($request->has('random')) {
                $response = $response->inRandomOrder()->limit($request->query('random'));
            }

            if($request->has('start_price')) {
                $response = $response->whereBetween('price', [
                    $request->query('start_price'),
                    $request->query('end_price')
                ]);
            }

            $this->response = Api::pagination($response);
        } catch (Exception $e){
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $museum = Cache::remember('museumDetail:'.$id,300, function () use ($id){
                return Museum::with('gallery')->findOrFail($id);
            });
            $this->response = $museum;
        } catch (Exception $e){
            if($e instanceof ModelNotFoundException){
                $this->code = 404;
            } else {
                $this->code = 500;
                $this->response = $e->getMessage();
            }
        }

        return Api::apiRespond($this->code, $this->response);
    }

    public function nearby(GetNearbyMuseumsRequest $request){
        try {
            $long = $request->long;
            $lat = $request->lat;
            $cacheLong = substr($long,0,-2);
            $cacheLat = substr($lat,0,-2);
            $cacheKey = "nearbyMuseums:".$cacheLong.":".$cacheLat;
            $museums = Cache::remember($cacheKey,86400, function () use ($long,$lat){
                $allMuseums = Cache::remember('allMuseums',86400, function () use ($long,$lat){
                    return Museum::get();
                });
                $payload = [
                    'items' => $allMuseums->toArray(),
                    'others' => [
                        'name' => Auth::check() ? Auth::user()->id : "digium",
                        'latitude' => $lat,
                        'longitude' => $long,
                    ],
                ];
                $response = Http::post('https://digium-ml.krobot.my.id/get_nearby_museum',$payload );
                $nerby = $response->json();
                return $nerby['data'];
            });
            $this->response = $museums;
        } catch (Exception $e){
            if($e instanceof ModelNotFoundException){
                $this->code = 404;
            } else {
                $this->code = 500;
                $this->response = $e->getMessage();
            }
        }

        return Api::apiRespond($this->code, $this->response);
    }
}
