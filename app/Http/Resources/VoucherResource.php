<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
            'active_at' => $this->active_at,
            'expired_at' => $this->expired_at,
            'status' => $this->status,
            'amount' => $this->amount,
        ];
    }
}
