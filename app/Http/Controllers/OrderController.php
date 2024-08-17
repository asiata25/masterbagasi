<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $cart = Order::where('user_id', $user_id)->with('orderItems.product')->first();

        return new OrderResource($cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $items = $request['order_items'];

        $user_id = Auth::id();
        $total = $validated['total'];
        $voucher_code = null;

        if (isset($validated['voucher_code'])) {
            $voucher = Voucher::find($validated['voucher_code']);

            if ($voucher) {
                $voucher_code = $voucher->code;
                $total -= $voucher->amount;
                $total = max($total, 0);
            }
        }

        // BUG: voucher code is still null
        $order = Order::create([
            'user_id' => $user_id,
            'voucer_code' => $voucher_code,
            'total' => $total,
        ]);

        $order_items = [];
        foreach ($items as $item) {
            array_push($order_items, [
                'product_id' => $item['product_id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'order_id' => $order->id
            ]);
        }

        $order->orderItems()->createMany($order_items);

        return response()->json(['message' => 'ok']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
