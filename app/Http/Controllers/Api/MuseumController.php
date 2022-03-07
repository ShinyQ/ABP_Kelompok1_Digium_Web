<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\museum;
use Illuminate\Http\Request;
use Exception;
use Api;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show(museum $museum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, museum $museum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(museum $museum)
    {
        //
    }
}
