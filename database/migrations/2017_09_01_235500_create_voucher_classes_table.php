<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_classes', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('afip_id')->nullable();
            $table->smallInteger('IdGrupoComp')->nullable();
            $table->smallInteger('Iguales')->nullable();

            $table->string('name', 50);

            $table->string('abbreviation', 15)->nullable();
            $table->string('subsystem', 20)->nullable()->index();

            $table->smallInteger('afip_cf_mono_ri')->comment('0: Resp Insc, letter A. 1: es CF o Monotrib, letter B, 2: es C y otros no va')->nullable();
            $table->smallInteger('afip_suma')->nullable();
            $table->smallInteger('Suma1')->nullable();
            $table->smallInteger('sum_stock')->nullable();
            $table->smallInteger('SumaCaja')->nullable();
            $table->smallInteger('SumaIVAVentas')->nullable();
            $table->smallInteger('SumaIVACompras')->nullable();

            $table->smallInteger('NMaxLin')->nullable();
            $table->string('DuplixDetalle', 1)->nullable();
            $table->string('numeracion_pv', 10)->default(0);

            $table->unsignedBigInteger('voucher_class_anula_id')->nullable()->index();
            $table->string('EmisionPropia', 1)->nullable();
        });

        /**
         * Va aparte porque es sobre la misma tabla, si lo corro arriba entonces operacion_materials aún no existe
         */
        Schema::table('voucher_classes', function (Blueprint $table) {
            $table->foreign('voucher_class_anula_id')->references('id')->on('voucher_classes')->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_classes');
    }
};
