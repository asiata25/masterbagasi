<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
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

        $product_exist = $cart->cartItems()->where('product_id', $validated['product_id'])->first();
        if ($product_exist) {
            $cart->cartItems()
                ->where('product_id', $validated['product_id'])
                ->update(['quantity' => $validated['quantity']]);
        } else {
            $cart->cartItems()->create($validated);
        }

        return response()->json([
            'message' => 'ok',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $item_id)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        $item = $cart->cartItems()->where('product_id', $item_id);
        if (!$item->first()) {
            return response()->json(['messege' => 'data not found'])->setStatusCode(404);
        }
        $item->forceDelete();

        return response()->json(['messege' => 'ok']);
    }
}
