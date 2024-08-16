<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoucherRequest;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VoucherController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VoucherResource::collection(Voucher::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoucherRequest $request): JsonResponse
    {
        $validated = $request->validated();
        Voucher::create([
            'code' => strtoupper($validated['code']),
            'active_at' => $validated['active_at'],
            'expired_at' => $validated['expired_at'],
            'amount' => $validated['amount'],
        ]);
        
        return response()->json([
            "message" => "ok",
        ])->setStatusCode(201);
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
