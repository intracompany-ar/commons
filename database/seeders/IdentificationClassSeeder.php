<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdentificationClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=0');
        DB::table('identification_classes')->truncate();

        DB::table('identification_classes')->insert(array(
            ['id' => 1, 'afip_id' => 0, 'name' => 'CI Policía Federal' ,'id_cx' => 6, 'description' => 'Céd.Ident.Pol.Fed.','abbreviation' => 'CIPF'],
            ['id' => 2, 'afip_id' => 1, 'name' => 'CI Buenos Aires' , 'id_cx' => 14, 'description' => 'Ced.Ident.Buenos Aires', 'abbreviation' => 'CIBA'],
            ['id' => 3, 'afip_id' => 2, 'name' => 'CI Catamarca' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 4, 'afip_id' => 3, 'name' => 'CI Córdoba' ,'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],                                                                                                                                                                               
            ['id' => 5, 'afip_id' => 4, 'name' => 'CI Corrientes', 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 6, 'afip_id' => 5, 'name' => 'CI Entre Ríos' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 7, 'afip_id' => 6, 'name' => 'CI Jujuy' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 8, 'afip_id' => 7, 'name' => 'CI Mendoza' ,'id_cx' => 15, 'description' => 'Ced.Ident.Mendoza', 'abbreviation' => 'CIMZ'],
            ['id' => 9, 'afip_id' => 8, 'name' => 'CI La Rioja' , 'id_cx' => 16, 'description' => 'Ced.Ident.La Rioja','abbreviation' => 'CILR'],
            ['id' => 10, 'afip_id' => 9, 'name' => 'CI Salta' , 'id_cx' => 17, 'description' => 'Ced.Ident.Salta', 'abbreviation' => 'CIST'],
            ['id' => 11, 'afip_id' => 10, 'name' => 'CI San Juan' , 'id_cx' => 18, 'description' => 'Ced.Ident.San Juan','abbreviation' => 'CISJ'],
            ['id' => 12, 'afip_id' => 11, 'name' => 'CI San Luis' , 'id_cx' => 19, 'description' => 'Ced.Ident.San Luis','abbreviation' => 'CISL'],
            ['id' => 13, 'afip_id' => 12, 'name' => 'CI Santa Fe' , 'id_cx' => 5, 'description' => 'Céd.Ident.Sante Fe','abbreviation' => 'CISF'],
            ['id' => 14, 'afip_id' => 13, 'name' => 'CI Santiago del Estero' ,'id_cx' => 20, 'description' => 'Ced.Ident.Santiago del Estero', 'abbreviation' => 'CISE'],
            ['id' => 15, 'afip_id' => 14, 'name' => 'CI Tucumán' ,'id_cx' => 21, 'description' => 'Ced.Ident.Tucumán', 'abbreviation' => 'CITU'],
            ['id' => 16, 'afip_id' => 16, 'name' => 'CI Chaco' , 'id_cx' => 22, 'description' => 'Ced.Ident.Chaco', 'abbreviation' => 'CICH'],
            ['id' => 17, 'afip_id' => 17, 'name' => 'CI Chubut' , 'id_cx' => 23, 'description' => 'Ced.Ident.Chubut', 'abbreviation' => 'CICU'],
            ['id' => 18, 'afip_id' => 18, 'name' => 'CI Formosa' ,'id_cx' => 24, 'description' => 'Ced.Ident.Formosa', 'abbreviation' => 'CIFO'],
            ['id' => 19, 'afip_id' => 19, 'name' => 'CI Misiones' , 'id_cx' => 25, 'description' => 'Ced.Ident.Misiones','abbreviation' => 'CIMI'],
            ['id' => 20, 'afip_id' => 20, 'name' => 'CI Neuquén' ,'id_cx' => 26, 'description' => 'Ced.Ident.Neuquén', 'abbreviation' => 'CINQ'],
            ['id' => 21, 'afip_id' => 21, 'name' => 'CI La Pampa' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 22, 'afip_id' => 22, 'name' => 'CI Río Negro' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 23, 'afip_id' => 23, 'name' => 'CI Santa Cruz' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 24, 'afip_id' => 24, 'name' => 'CI Tierra del Fuego' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 25, 'afip_id' => 80, 'name' => 'CUIT' , 'id_cx' => 9, 'description' => 'C.U.I.T.','abbreviation' => 'CUIT'],
            ['id' => 26, 'afip_id' => 86, 'name' => 'CUIL' , 'id_cx' => 11, 'description' => 'C.U.I.L.','abbreviation' => 'CUIL'],
            ['id' => 27, 'afip_id' => 87, 'name' => 'CDI' , 'id_cx' => 8, 'description' => 'Documento de Identidad', 'abbreviation' => 'DI'],
            ['id' => 28, 'afip_id' => 89, 'name' => 'LE' ,'id_cx' => 3, 'description' => 'Libreta de Enrolamiento','abbreviation' => 'LE'],
            ['id' => 29, 'afip_id' => 90, 'name' => 'LC' ,'id_cx' => 4, 'description' => 'Libreta Cívica', 'abbreviation' => 'LC'],
            ['id' => 30, 'afip_id' => 91, 'name' => 'CI extranjera' , 'id_cx' => 10, 'description' => 'Ident.Extranjera', 'abbreviation' => 'EXT'],
            ['id' => 31, 'afip_id' => 92, 'name' => 'en trámite' ,'id_cx' => 1, 'description' => 'Sin Documento','abbreviation' => 'S/D'],
            ['id' => 32, 'afip_id' => 93, 'name' => 'Acta nacimiento' , 'id_cx' => 12, 'description' => 'Acta de Nacimiento','abbreviation' => 'AN'],
            ['id' => 33, 'afip_id' => 94, 'name' => 'Pasaporte' , 'id_cx' => 7, 'description' => 'Pasaporte', 'abbreviation' => 'PAS'],
            ['id' => 34, 'afip_id' => 95, 'name' => 'CI Bs. As. RNP' ,'id_cx' => 13, 'description' => 'Ced.Ident.Bs.As.RNP', 'abbreviation' => 'CIBR'],
            ['id' => 35, 'afip_id' => 96, 'name' => 'DNI' , 'id_cx' => 2, 'description' => 'Documento Nacional de Identidad', 'abbreviation' => 'DNI'],
            ['id' => 36, 'afip_id' => 99, 'name' => 'Sin identificar/venta global diaria' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],


            ['id' => 37, 'afip_id' => 30, 'name' => 'Certificado de Migración' , 'id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 38, 'afip_id' => 88, 'name' => 'Usado por Anses para Padrón','id_cx' => NULL, 'description' => NULL, 'abbreviation' => NULL]
        ));
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1');
    }
}
