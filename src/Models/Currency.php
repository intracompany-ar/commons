<?php

namespace IntraCompany\Commons\Models;

use IntraCompany\Commons\Scopes\OrderByNameScope;

use Illuminate\Database\Eloquent\{
    Builder,
    Model
};

use Illuminate\Support\Facades\Cache;

/**
 * De ARCA , mismo cod que CX
 *
 * https://www.afip.gob.ar/libro-iva-digital/documentos/Libro-IVA-Digital-Tablas-del-Sistema.pdf
 *
 */
class Currency extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    const ID_PESO_ARG_CX = 1;
    const ID_PESO_ARG = 2;
    const ID_USS_USA = 3;
    const ID_USS_BLUE = 4;
    const ID_EURO = 58;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('onlyCommonsCurrencies', function (Builder $builder) {
            $builder->whereIn('id', [2, 3, 4, 13, 14, 20, 22, 48, 58, 63]);
        });

        static::addGlobalScope(new OrderByNameScope);

        /**
         * EVENTS
         */
        self::saved(function ($currency) {
            Cache::store('redis')->forget('currencies_commons_json');
        });
    }


    static public function todas()
    {
        // Cache::store('redis')->forget('currencies_commons_json');
        return Cache::store('redis')->rememberForever('currencies_commons_json', function () {
            return self::all();
        });
    }
}

/*

    Schema::create('currencies', function (Blueprint $table) {
        $table->increments('id');
        $table->string('cod',4)->unique();
        $table->string('name',50);
        $table->string('symbol',50)->nullable();
        $table->smallInteger('currency_cx_id')->nullable();
    });

*/
