<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Api;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
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
