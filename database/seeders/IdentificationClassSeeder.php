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
            ['id' => 1, 'afip_id' => 0, 'name' => 'CI Policía Federal' ,'IdTipoDocumento_CX' => 6, 'descripcion' => 'Céd.Ident.Pol.Fed.','abreviacion' => 'CIPF'],
            ['id' => 2, 'afip_id' => 1, 'name' => 'CI Buenos Aires' , 'IdTipoDocumento_CX' => 14, 'descripcion' => 'Ced.Ident.Buenos Aires', 'abreviacion' => 'CIBA'],
            ['id' => 3, 'afip_id' => 2, 'name' => 'CI Catamarca' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 4, 'afip_id' => 3, 'name' => 'CI Córdoba' ,'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],                                                                                                                                                                               
            ['id' => 5, 'afip_id' => 4, 'name' => 'CI Corrientes', 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 6, 'afip_id' => 5, 'name' => 'CI Entre Ríos' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 7, 'afip_id' => 6, 'name' => 'CI Jujuy' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 8, 'afip_id' => 7, 'name' => 'CI Mendoza' ,'IdTipoDocumento_CX' => 15, 'descripcion' => 'Ced.Ident.Mendoza', 'abreviacion' => 'CIMZ'],
            ['id' => 9, 'afip_id' => 8, 'name' => 'CI La Rioja' , 'IdTipoDocumento_CX' => 16, 'descripcion' => 'Ced.Ident.La Rioja','abreviacion' => 'CILR'],
            ['id' => 10, 'afip_id' => 9, 'name' => 'CI Salta' , 'IdTipoDocumento_CX' => 17, 'descripcion' => 'Ced.Ident.Salta', 'abreviacion' => 'CIST'],
            ['id' => 11, 'afip_id' => 10, 'name' => 'CI San Juan' , 'IdTipoDocumento_CX' => 18, 'descripcion' => 'Ced.Ident.San Juan','abreviacion' => 'CISJ'],
            ['id' => 12, 'afip_id' => 11, 'name' => 'CI San Luis' , 'IdTipoDocumento_CX' => 19, 'descripcion' => 'Ced.Ident.San Luis','abreviacion' => 'CISL'],
            ['id' => 13, 'afip_id' => 12, 'name' => 'CI Santa Fe' , 'IdTipoDocumento_CX' => 5, 'descripcion' => 'Céd.Ident.Sante Fe','abreviacion' => 'CISF'],
            ['id' => 14, 'afip_id' => 13, 'name' => 'CI Santiago del Estero' ,'IdTipoDocumento_CX' => 20, 'descripcion' => 'Ced.Ident.Santiago del Estero', 'abreviacion' => 'CISE'],
            ['id' => 15, 'afip_id' => 14, 'name' => 'CI Tucumán' ,'IdTipoDocumento_CX' => 21, 'descripcion' => 'Ced.Ident.Tucumán', 'abreviacion' => 'CITU'],
            ['id' => 16, 'afip_id' => 16, 'name' => 'CI Chaco' , 'IdTipoDocumento_CX' => 22, 'descripcion' => 'Ced.Ident.Chaco', 'abreviacion' => 'CICH'],
            ['id' => 17, 'afip_id' => 17, 'name' => 'CI Chubut' , 'IdTipoDocumento_CX' => 23, 'descripcion' => 'Ced.Ident.Chubut', 'abreviacion' => 'CICU'],
            ['id' => 18, 'afip_id' => 18, 'name' => 'CI Formosa' ,'IdTipoDocumento_CX' => 24, 'descripcion' => 'Ced.Ident.Formosa', 'abreviacion' => 'CIFO'],
            ['id' => 19, 'afip_id' => 19, 'name' => 'CI Misiones' , 'IdTipoDocumento_CX' => 25, 'descripcion' => 'Ced.Ident.Misiones','abreviacion' => 'CIMI'],
            ['id' => 20, 'afip_id' => 20, 'name' => 'CI Neuquén' ,'IdTipoDocumento_CX' => 26, 'descripcion' => 'Ced.Ident.Neuquén', 'abreviacion' => 'CINQ'],
            ['id' => 21, 'afip_id' => 21, 'name' => 'CI La Pampa' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 22, 'afip_id' => 22, 'name' => 'CI Río Negro' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 23, 'afip_id' => 23, 'name' => 'CI Santa Cruz' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 24, 'afip_id' => 24, 'name' => 'CI Tierra del Fuego' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 25, 'afip_id' => 80, 'name' => 'CUIT' , 'IdTipoDocumento_CX' => 9, 'descripcion' => 'C.U.I.T.','abreviacion' => 'CUIT'],
            ['id' => 26, 'afip_id' => 86, 'name' => 'CUIL' , 'IdTipoDocumento_CX' => 11, 'descripcion' => 'C.U.I.L.','abreviacion' => 'CUIL'],
            ['id' => 27, 'afip_id' => 87, 'name' => 'CDI' , 'IdTipoDocumento_CX' => 8, 'descripcion' => 'Documento de Identidad', 'abreviacion' => 'DI'],
            ['id' => 28, 'afip_id' => 89, 'name' => 'LE' ,'IdTipoDocumento_CX' => 3, 'descripcion' => 'Libreta de Enrolamiento','abreviacion' => 'LE'],
            ['id' => 29, 'afip_id' => 90, 'name' => 'LC' ,'IdTipoDocumento_CX' => 4, 'descripcion' => 'Libreta Cívica', 'abreviacion' => 'LC'],
            ['id' => 30, 'afip_id' => 91, 'name' => 'CI extranjera' , 'IdTipoDocumento_CX' => 10, 'descripcion' => 'Ident.Extranjera', 'abreviacion' => 'EXT'],
            ['id' => 31, 'afip_id' => 92, 'name' => 'en trámite' ,'IdTipoDocumento_CX' => 1, 'descripcion' => 'Sin Documento','abreviacion' => 'S/D'],
            ['id' => 32, 'afip_id' => 93, 'name' => 'Acta nacimiento' , 'IdTipoDocumento_CX' => 12, 'descripcion' => 'Acta de Nacimiento','abreviacion' => 'AN'],
            ['id' => 33, 'afip_id' => 94, 'name' => 'Pasaporte' , 'IdTipoDocumento_CX' => 7, 'descripcion' => 'Pasaporte', 'abreviacion' => 'PAS'],
            ['id' => 34, 'afip_id' => 95, 'name' => 'CI Bs. As. RNP' ,'IdTipoDocumento_CX' => 13, 'descripcion' => 'Ced.Ident.Bs.As.RNP', 'abreviacion' => 'CIBR'],
            ['id' => 35, 'afip_id' => 96, 'name' => 'DNI' , 'IdTipoDocumento_CX' => 2, 'descripcion' => 'Documento Nacional de Identidad', 'abreviacion' => 'DNI'],
            ['id' => 36, 'afip_id' => 99, 'name' => 'Sin identificar/venta global diaria' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],


            ['id' => 37, 'afip_id' => 30, 'name' => 'Certificado de Migración' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 38, 'afip_id' => 88, 'name' => 'Usado por Anses para Padrón','IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL]
        ));
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1');
    }
}
