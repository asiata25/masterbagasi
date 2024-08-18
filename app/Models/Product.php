<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price'];

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $data = $this->where($field ?? $this->getRouteKeyName(), $value)->first();

        if (! $data) {
            abort(response()->json(['message' => 'data not found'], 404));
        }

        return $data;
    }
}
