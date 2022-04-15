<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Api;

class GalleryController extends Controller
{
    private $response, $code;

    public function __construct()
    {
        $this->code = 200;
        $this->response = [];
    }

    public function show($id)
    {
        try {
            $response = Gallery::where('museum_id', $id);
            $this->response = Api::pagination($response);
        } catch (Exception $e){
            $this->code = 500;
            $this->response = $e->getMessage();
        }

        return Api::apiRespond($this->code, $this->response);
    }
}
