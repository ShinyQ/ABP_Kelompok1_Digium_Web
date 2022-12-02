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
}
