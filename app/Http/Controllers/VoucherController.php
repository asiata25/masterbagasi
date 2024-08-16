<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VoucherController implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('adminOnly', except: ['index', 'show']),
        ];
    }

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
    public function show(Voucher $voucher)
    {
        return new VoucherResource(Voucher::where('code', $voucher->code)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        $validated = $request->validated();

        $data=  $voucher->update($validated);

        return response()->json([
            "message" => 'ok',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return response()->json(['message' => 'ok']);
    }
}
