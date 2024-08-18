<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['code', 'active_at', 'expired_at', 'amount', 'status'];
    
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $post = $this->where($field ?? $this->getRouteKeyName(), $value)->first();

        if (!$post) {
            abort(response()->json(['message' => 'data not found'], 404));
        }

        return $post;
    }
}
