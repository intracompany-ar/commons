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
            ['id' => 1, 'afip_id' => 0, 'name' => 'CI Policía Federal' ,'IdTipoDocumento_CX' => 6, 'description' => 'Céd.Ident.Pol.Fed.','abbreviation' => 'CIPF'],
            ['id' => 2, 'afip_id' => 1, 'name' => 'CI Buenos Aires' , 'IdTipoDocumento_CX' => 14, 'description' => 'Ced.Ident.Buenos Aires', 'abbreviation' => 'CIBA'],
            ['id' => 3, 'afip_id' => 2, 'name' => 'CI Catamarca' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 4, 'afip_id' => 3, 'name' => 'CI Córdoba' ,'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],                                                                                                                                                                               
            ['id' => 5, 'afip_id' => 4, 'name' => 'CI Corrientes', 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 6, 'afip_id' => 5, 'name' => 'CI Entre Ríos' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 7, 'afip_id' => 6, 'name' => 'CI Jujuy' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 8, 'afip_id' => 7, 'name' => 'CI Mendoza' ,'IdTipoDocumento_CX' => 15, 'description' => 'Ced.Ident.Mendoza', 'abbreviation' => 'CIMZ'],
            ['id' => 9, 'afip_id' => 8, 'name' => 'CI La Rioja' , 'IdTipoDocumento_CX' => 16, 'description' => 'Ced.Ident.La Rioja','abbreviation' => 'CILR'],
            ['id' => 10, 'afip_id' => 9, 'name' => 'CI Salta' , 'IdTipoDocumento_CX' => 17, 'description' => 'Ced.Ident.Salta', 'abbreviation' => 'CIST'],
            ['id' => 11, 'afip_id' => 10, 'name' => 'CI San Juan' , 'IdTipoDocumento_CX' => 18, 'description' => 'Ced.Ident.San Juan','abbreviation' => 'CISJ'],
            ['id' => 12, 'afip_id' => 11, 'name' => 'CI San Luis' , 'IdTipoDocumento_CX' => 19, 'description' => 'Ced.Ident.San Luis','abbreviation' => 'CISL'],
            ['id' => 13, 'afip_id' => 12, 'name' => 'CI Santa Fe' , 'IdTipoDocumento_CX' => 5, 'description' => 'Céd.Ident.Sante Fe','abbreviation' => 'CISF'],
            ['id' => 14, 'afip_id' => 13, 'name' => 'CI Santiago del Estero' ,'IdTipoDocumento_CX' => 20, 'description' => 'Ced.Ident.Santiago del Estero', 'abbreviation' => 'CISE'],
            ['id' => 15, 'afip_id' => 14, 'name' => 'CI Tucumán' ,'IdTipoDocumento_CX' => 21, 'description' => 'Ced.Ident.Tucumán', 'abbreviation' => 'CITU'],
            ['id' => 16, 'afip_id' => 16, 'name' => 'CI Chaco' , 'IdTipoDocumento_CX' => 22, 'description' => 'Ced.Ident.Chaco', 'abbreviation' => 'CICH'],
            ['id' => 17, 'afip_id' => 17, 'name' => 'CI Chubut' , 'IdTipoDocumento_CX' => 23, 'description' => 'Ced.Ident.Chubut', 'abbreviation' => 'CICU'],
            ['id' => 18, 'afip_id' => 18, 'name' => 'CI Formosa' ,'IdTipoDocumento_CX' => 24, 'description' => 'Ced.Ident.Formosa', 'abbreviation' => 'CIFO'],
            ['id' => 19, 'afip_id' => 19, 'name' => 'CI Misiones' , 'IdTipoDocumento_CX' => 25, 'description' => 'Ced.Ident.Misiones','abbreviation' => 'CIMI'],
            ['id' => 20, 'afip_id' => 20, 'name' => 'CI Neuquén' ,'IdTipoDocumento_CX' => 26, 'description' => 'Ced.Ident.Neuquén', 'abbreviation' => 'CINQ'],
            ['id' => 21, 'afip_id' => 21, 'name' => 'CI La Pampa' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 22, 'afip_id' => 22, 'name' => 'CI Río Negro' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 23, 'afip_id' => 23, 'name' => 'CI Santa Cruz' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 24, 'afip_id' => 24, 'name' => 'CI Tierra del Fuego' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 25, 'afip_id' => 80, 'name' => 'CUIT' , 'IdTipoDocumento_CX' => 9, 'description' => 'C.U.I.T.','abbreviation' => 'CUIT'],
            ['id' => 26, 'afip_id' => 86, 'name' => 'CUIL' , 'IdTipoDocumento_CX' => 11, 'description' => 'C.U.I.L.','abbreviation' => 'CUIL'],
            ['id' => 27, 'afip_id' => 87, 'name' => 'CDI' , 'IdTipoDocumento_CX' => 8, 'description' => 'Documento de Identidad', 'abbreviation' => 'DI'],
            ['id' => 28, 'afip_id' => 89, 'name' => 'LE' ,'IdTipoDocumento_CX' => 3, 'description' => 'Libreta de Enrolamiento','abbreviation' => 'LE'],
            ['id' => 29, 'afip_id' => 90, 'name' => 'LC' ,'IdTipoDocumento_CX' => 4, 'description' => 'Libreta Cívica', 'abbreviation' => 'LC'],
            ['id' => 30, 'afip_id' => 91, 'name' => 'CI extranjera' , 'IdTipoDocumento_CX' => 10, 'description' => 'Ident.Extranjera', 'abbreviation' => 'EXT'],
            ['id' => 31, 'afip_id' => 92, 'name' => 'en trámite' ,'IdTipoDocumento_CX' => 1, 'description' => 'Sin Documento','abbreviation' => 'S/D'],
            ['id' => 32, 'afip_id' => 93, 'name' => 'Acta nacimiento' , 'IdTipoDocumento_CX' => 12, 'description' => 'Acta de Nacimiento','abbreviation' => 'AN'],
            ['id' => 33, 'afip_id' => 94, 'name' => 'Pasaporte' , 'IdTipoDocumento_CX' => 7, 'description' => 'Pasaporte', 'abbreviation' => 'PAS'],
            ['id' => 34, 'afip_id' => 95, 'name' => 'CI Bs. As. RNP' ,'IdTipoDocumento_CX' => 13, 'description' => 'Ced.Ident.Bs.As.RNP', 'abbreviation' => 'CIBR'],
            ['id' => 35, 'afip_id' => 96, 'name' => 'DNI' , 'IdTipoDocumento_CX' => 2, 'description' => 'Documento Nacional de Identidad', 'abbreviation' => 'DNI'],
            ['id' => 36, 'afip_id' => 99, 'name' => 'Sin identificar/venta global diaria' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],


            ['id' => 37, 'afip_id' => 30, 'name' => 'Certificado de Migración' , 'IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL],
            ['id' => 38, 'afip_id' => 88, 'name' => 'Usado por Anses para Padrón','IdTipoDocumento_CX' => NULL, 'description' => NULL, 'abbreviation' => NULL]
        ));
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1');
    }
}
