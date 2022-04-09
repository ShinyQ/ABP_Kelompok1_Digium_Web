<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Museum;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Api;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $user, $code, $response;

    public function __construct(User $user)
    {
        $this->user = $user;
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
            $response = Transaction::with('museum')->where('user_id', $this->user->getUserId());

            if($request->has('status')) {
                $response = $response->where('status', $request->query('status'));
            }

            if($request->has('created')) {
                $response = $response->where('created', '>=', now()->subDays($request->has('created'))->endOfDay());
            }

            $this->response = Api::pagination($response);
        } catch (Exception $e){
            $this->code = 500;
            $this->response = $e->getMessage();
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
            $data = $request->validated();
            $data['user_id'] =  $this->user->getUserId();
            $data['total_price'] = Museum::findOrFail($data['museum_id'])->price * $data['qty'];

            $this->response = Transaction::create($data);
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
            $this->response = Transaction::with('transaction_item')
                ->where('user_id', $this->user->getUserId())
                ->findOrFail($id);

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
