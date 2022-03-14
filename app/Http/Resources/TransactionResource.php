<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'accounts' => AccountResource::collection($this->whenLoaded('accounts')),
            'account_id' => $this->account_id,
            'donation_interval' => $this->donation_interval,
            'donation_amount' => $this->uudonation_amountid,
            'form_of_payment' => $this->form_of_payment,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
