<?php

namespace DuxDucisArsen\Commons\Models;

use DuxDucisArsen\Commons\Scopes\OrderByNameScope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Oficial de AFIP, con código para vincular con CX
 *
 * https://www.afip.gob.ar/libro-iva-digital/documentos/Libro-IVA-Digital-Tablas-del-Sistema.pdf
 */
class IdentificationClass extends Model
{
    const ID_CUIT = 25;
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('sinCI', function (Builder $builder) {
            $builder->where('id', '>', 24); // Descarto las CI que entregaba cada provincia
        });


        static::addGlobalScope(new OrderByNameScope);

        /**
         * EVENTS
         */
        self::saved(function ($model) {
            Cache::store('redis')->forget('identification_classes_all_json');
        });
    }


    /**
     * QUERYS
     *
     */
    static public function todas($json = null)
    {
        Cache::store('redis')->forget('tipo_documentos_all_json');
        $resultJson =  Cache::store('redis')->rememberForever('identification_classes_all_json', function () {
            return self::all()->toJson();
        });
        return $json ? $resultJson : json_decode($resultJson);
    }
}
