<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\transaction;
use Illuminate\Http\Response;
use Api;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
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
     * Store a newly created resource in storage.
     *
     * @param TransactionRequest $request
     * @return Response
     */
    public function store(TransactionRequest $request)
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
