<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Api;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        } catch (Exception $e){

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

        } catch (Exception $e){

        }

        return Api::apiRespond($this->code, $this->response);
    }
}
