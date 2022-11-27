<?php

namespace Database\Seeders\Afip;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(array(
                ['id' => 1, 'cod' =>'000' , 'name' => 'OTRAS MONEDAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 2, 'cod' =>'PES ' , 'name' => 'PESOS ', 'currency_cx_id' => 1, 'simbolo' => '$' ],
                ['id' => 3, 'cod' =>'DOL ' , 'name' => 'Dólar ESTADOUNIDENSE ', 'currency_cx_id' => 2, 'simbolo' => 'U$S' ],
                ['id' => 4, 'cod' =>'002' , 'name' => 'Dólar EEUU LIBRE ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 5, 'cod' =>'003' , 'name' => 'FRANCOS FRANCESES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 6, 'cod' =>'004' , 'name' => 'LIRAS ITALIANAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 7, 'cod' =>'005' , 'name' => 'PESETAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 8, 'cod' =>'006' , 'name' => 'MARCOS ALEMANES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 9, 'cod' =>'007' , 'name' => 'FLORINES HOLANDESES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 10, 'cod' =>'008' , 'name' => 'FRANCOS BELGAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 11, 'cod' =>'009' , 'name' => 'FRANCOS SUIZOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 12, 'cod' =>'010' , 'name' => 'PESOS MEJICANOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 13, 'cod' =>'011' , 'name' => 'PESOS URUGUAYOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 14, 'cod' =>'012' , 'name' => 'REAL', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 15, 'cod' =>'013' , 'name' => 'ESCUDOS PORTUGUESES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 16, 'cod' =>'014' , 'name' => 'CORONAS DANESAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 17, 'cod' =>'015' , 'name' => 'CORONAS NORUEGAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 18, 'cod' =>'016' , 'name' => 'CORONAS SUECAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 19, 'cod' =>'017' , 'name' => 'CHELINES AUTRIACOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 20, 'cod' =>'018' , 'name' => 'Dólar CANADIENSE ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 21, 'cod' =>'019' , 'name' => 'YENS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 22, 'cod' =>'021' , 'name' => 'LIBRA ESTERLINA ', 'currency_cx_id' => NULL, 'simbolo' => 'GPU' ],
                ['id' => 23, 'cod' =>'022' , 'name' => 'MARCOS FINLANDESES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 24, 'cod' =>'023' , 'name' => 'BOLIVAR (VENEZOLANO)', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 25, 'cod' =>'024' , 'name' => 'CORONA CHECA ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 26, 'cod' =>'025' , 'name' => 'DINAR (YUGOSLAVO) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 27, 'cod' =>'026' , 'name' => 'Dólar AUSTRALIANO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 28, 'cod' =>'027' , 'name' => 'DRACMA (GRIEGO) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 29, 'cod' =>'028' , 'name' => 'FLORIN (ANTILLAS HOLA ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 30, 'cod' =>'029' , 'name' => 'GUARANI ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 31, 'cod' =>'030' , 'name' => 'SHEKEL (ISRAEL) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 32, 'cod' =>'031' , 'name' => 'PESO BOLIVIANO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 33, 'cod' =>'032' , 'name' => 'PESO COLOMBIANO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 34, 'cod' =>'033' , 'name' => 'PESO CHILENO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 35, 'cod' =>'034' , 'name' => 'RAND (SUDAFRICANO)', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 36, 'cod' =>'035' , 'name' => 'NUEVO SOL PERUANO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 37, 'cod' =>'036' , 'name' => 'SUCRE (ECUATORIANO) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 38, 'cod' =>'040' , 'name' => 'LEI RUMANOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 39, 'cod' =>'041' , 'name' => 'DERECHOS ESPECIALES DE GIRO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 40, 'cod' =>'042' , 'name' => 'PESOS DOMINICANOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 41, 'cod' =>'043' , 'name' => 'BALBOAS PANAMEÑAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 42, 'cod' =>'044' , 'name' => 'CORDOBAS NICARAGÛENSES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 43, 'cod' =>'045' , 'name' => 'DIRHAM MARROQUÍES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 44, 'cod' =>'046' , 'name' => 'LIBRAS EGIPCIAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 45, 'cod' =>'047' , 'name' => 'RIYALS SAUDITAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 46, 'cod' =>'048' , 'name' => 'BRANCOS BELGAS FINANCIERAS', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 47, 'cod' =>'049' , 'name' => 'GRAMOS DE ORO FINO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 48, 'cod' =>'050' , 'name' => 'LIBRAS IRLANDESAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 49, 'cod' =>'051' , 'name' => 'Dólar DE HONG KONG ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 50, 'cod' =>'052' , 'name' => 'Dólar DE SINGAPUR ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 51, 'cod' =>'053' , 'name' => 'Dólar DE JAMAICA ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 52, 'cod' =>'054' , 'name' => 'Dólar DE TAIWAN ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 53, 'cod' =>'055' , 'name' => 'QUETZAL (GUATEMALTECOS) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 54, 'cod' =>'056' , 'name' => 'FORINT (HUNGRIA) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 55, 'cod' =>'057' , 'name' => 'BAHT (TAILANDIA) ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 56, 'cod' =>'058' , 'name' => 'ECU ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 57, 'cod' =>'059' , 'name' => 'DINAR KUWAITI ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 58, 'cod' =>'060' , 'name' => 'EURO ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 59, 'cod' =>'061' , 'name' => 'ZLTYS POLACOS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 60, 'cod' =>'062' , 'name' => 'RUPIAS HINDÚES ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 61, 'cod' =>'063' , 'name' => 'LEMPIRAS HONDUREÑAS ', 'currency_cx_id' => NULL, 'simbolo' => NULL ],
                ['id' => 62, 'cod' =>'064' , 'name' => 'YUAN (Rep. Pop. China)', 'currency_cx_id' => NULL, 'simbolo' => NULL ]
          )
        );
    }
}
