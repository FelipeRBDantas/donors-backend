<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'account_type' => $this->account_type,
            'debit_number' => $this->debit_number,
            'credit_bunner' => $this->credit_bunner,
            'credit_first_number' => $this->credit_first_number,
            'credit_final_number' => $this->credit_final_number,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d'),
            'updated_at' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
