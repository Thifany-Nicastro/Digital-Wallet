<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'payer' => $this->sender->user->full_name,
            'payee' => $this->receiver->user->full_name,
            'description' => $this->description,
            'value' => $this->amount,
            'date' => $this->created_at
        ];
    }
}
