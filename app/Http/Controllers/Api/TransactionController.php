<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTransaction;
use App\Http\Resources\TransactionResource;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transaction, $account;

    public function __construct(Transaction $transaction, Account $account)
    {
        $this->transaction = $transaction;
        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transaction->with('accounts')->get();

        return TransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTransaction $request)
    {
        $data = $request->validated();

        $account = $this->account->where('uuid', $data['account'])->first();

        $data['account_id'] = $account->id;

        $transaction = $this->transaction->create($data);

        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = $this->transaction->with('accounts')->get();

        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTransaction $request, $uuid)
    {
        $transaction = $this->transaction->where('uuid', $uuid)->firstOrFail();

        $data = $request->validated();

        $data['account_id'] = $transaction->account_id;

        $transaction->update($data);

        return response()->json(['message' => 'Registro atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $transaction = $this->transaction->where('uuid', $uuid)->firstOrFail();

        $transaction->delete();
        
        return response()->json([], 204);
    }
}
