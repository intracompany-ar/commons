<?php

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
        Schema::create('identification_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->smallinteger('afip_id')->nullable()->unique()->comment('oficial AFIP');
            $table->string('sap_id', 8)->nullable()->unique()->comment('SAP FAte');

            $table->string('name', 50)->comment('oficial AFIP');

            $table->string('description', 50)->nullable();
            $table->string('abbreviation', 6)->nullable();

            $table->smallInteger('id_cx')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identification_classes');
    }
};
