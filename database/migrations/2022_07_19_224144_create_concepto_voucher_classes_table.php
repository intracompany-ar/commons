<?php

use IntraCompany\Commons\Models\VoucherClass;
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
        Schema::create('concepto_voucher_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VoucherClass::class)->constrained()->restrictOnDelete()->cascadeOnUpdate();

            $table->unsignedInteger('concepto_cx_id');
            $table->foreign('concepto_cx_id')->references('id_cx')->on('conceptos')->restrictOnDelete()->cascadeOnUpdate();

            $table->string('debit_credit', 1)->comment('D o C de credit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concepto_voucher_classes');
    }
};
