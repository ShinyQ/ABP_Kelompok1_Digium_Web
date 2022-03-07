<?php

namespace App\Helper;

class ApiBuilder
{
    public static function apiRespond($code, $data = []): \Illuminate\Http\JsonResponse
    {
        $response['status'] = $code;

        if ($code == 200) {
            $response['message'] = "Success";
        } elseif ($code == 404) {
            $response['message'] = "Not Found";
        } elseif ($code == 400) {
            $response['message'] = "Bad Request";
        } elseif ($code == 401) {
            $response['message'] = "Unauthorized";
        } elseif ($code == 405) {
            $response['message'] = "Method Not Allowed";
        } else {
            $response['message'] = "Internal Server Error";
        }

        $response['data'] = $data;

        if ($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $response['data'] = [
                'data'      => $data->getCollection(),
                'paging'    => [
                    'first'         => $data->url(1),
                    'last'          => $data->url($data->lastPage()),
                    'prev'          => $data->previousPageUrl(),
                    'next'          => $data->nextPageUrl(),
                    'current_page'  => $data->currentPage(),
                    "from"          => 1,
                    "last_page"     => $data->lastPage(),
                    "per_page"      => $data->perPage(),
                ]
            ];
        }

        return response()->json($response, $code);
    }

    public static function pagination($response)
    {
        if (request()->has("paginate")) {
            $result = $response->paginate(request()->query("paginate"));
        } else {
            $result = $response->get();
        }

        return $result;
    }
}
