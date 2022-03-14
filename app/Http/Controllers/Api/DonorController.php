<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDonor;
use App\Http\Resources\DonorsResource;
use App\Models\User;
use App\Models\Donor;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    protected $donor, $transaction, $user;

    public function __construct(Donor $donor, Transaction $transaction, User $user)
    {
        $this->donor = $donor;
        $this->transaction = $transaction;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = $this->donor->with('user')->with('transactions.accounts')->get();

        return DonorsResource::collection($donors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDonor $request)
    {
        $data = $request->validated();

        $user = $this->user->where('uuid', $data['user'])->first();

        $data['user_id'] = $user->id;

        $transaction = $this->transaction->where('uuid', $data['transaction'])->first();

        $data['transaction_id'] = $transaction->id;

        $donor = $this->donor->create($data);

        return new DonorsResource($donor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $donor = $this->donor->where('uuid', $uuid)->with('user')->with('transactions.accounts')->first();

        return new DonorsResource($donor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDonor $request, $uuid)
    {
        $donor = $this->donor->where('uuid', $uuid)->firstOrFail();

        $data = $request->validated();

        $data['user_id'] = $donor->user_id;

        $data['transaction_id'] = $donor->transaction_id;

        $donor->update($data);

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
        $donor = $this->donor->where('uuid', $uuid)->firstOrFail();

        $donor->delete();
        
        return response()->json([], 204);
    }
}
