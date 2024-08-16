<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class CartController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->with('cartItems.product')->first();

        return new CartResource($cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $user = Auth::user();
        $cart = Cart::find($user->id);

        $productExist = $cart->cartItems()->where('product_id', $validated['product_id'])->first();
        if ($productExist) {
            $cart->cartItems()
                ->where('product_id', $validated['product_id'])
                ->update(['quantity' => $productExist->quantity + $validated['quantity']]);
        } else {
            $cart->cartItems()->create($validated);
        }

        return response()->json([
            "message" => "ok"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
