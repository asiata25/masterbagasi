<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
            // TODO: add voucher data when bug is solved
            // 'voucher' => VoucherResource::make($this->whenLoaded('voucher')),
            'total' => $this->total,
            'payment' => $this->payment,
            'status' => $this->status,
        ];
    }
}
