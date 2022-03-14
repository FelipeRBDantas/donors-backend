<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DonorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'user' => new UserResource($this->whenLoaded('user')),
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
            'cpf' => $this->cpf,
            'telephone' => $this->telephone,
            'birth_date' => $this->birth_date,
            'address' => $this->address,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
