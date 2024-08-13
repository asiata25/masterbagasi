<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->string('code');
            $table->primary(columns: 'code');
            $table->dateTimeTz(column: 'active_at');
            $table->dateTimeTz(column: 'expired_at');
            $table->enum(column: 'status', allowed: ['active', 'expired', 'upcoming'])->default('upcoming');
            $table->integer(column: 'amount')->default(0);
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
