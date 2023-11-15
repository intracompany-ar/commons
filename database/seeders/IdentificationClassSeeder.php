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
            ['id' => 1, 'cod' => 0, 'name' => 'CI Policía Federal' ,'IdTipoDocumento_CX' => 6, 'descripcion' => 'Céd.Ident.Pol.Fed.','abreviacion' => 'CIPF'],
            ['id' => 2, 'cod' => 1, 'name' => 'CI Buenos Aires' , 'IdTipoDocumento_CX' => 14, 'descripcion' => 'Ced.Ident.Buenos Aires', 'abreviacion' => 'CIBA'],
            ['id' => 3, 'cod' => 2, 'name' => 'CI Catamarca' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 4, 'cod' => 3, 'name' => 'CI Córdoba' ,'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],                                                                                                                                                                               
            ['id' => 5, 'cod' => 4, 'name' => 'CI Corrientes', 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 6, 'cod' => 5, 'name' => 'CI Entre Ríos' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 7, 'cod' => 6, 'name' => 'CI Jujuy' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 8, 'cod' => 7, 'name' => 'CI Mendoza' ,'IdTipoDocumento_CX' => 15, 'descripcion' => 'Ced.Ident.Mendoza', 'abreviacion' => 'CIMZ'],
            ['id' => 9, 'cod' => 8, 'name' => 'CI La Rioja' , 'IdTipoDocumento_CX' => 16, 'descripcion' => 'Ced.Ident.La Rioja','abreviacion' => 'CILR'],
            ['id' => 10, 'cod' => 9, 'name' => 'CI Salta' , 'IdTipoDocumento_CX' => 17, 'descripcion' => 'Ced.Ident.Salta', 'abreviacion' => 'CIST'],
            ['id' => 11, 'cod' => 10, 'name' => 'CI San Juan' , 'IdTipoDocumento_CX' => 18, 'descripcion' => 'Ced.Ident.San Juan','abreviacion' => 'CISJ'],
            ['id' => 12, 'cod' => 11, 'name' => 'CI San Luis' , 'IdTipoDocumento_CX' => 19, 'descripcion' => 'Ced.Ident.San Luis','abreviacion' => 'CISL'],
            ['id' => 13, 'cod' => 12, 'name' => 'CI Santa Fe' , 'IdTipoDocumento_CX' => 5, 'descripcion' => 'Céd.Ident.Sante Fe','abreviacion' => 'CISF'],
            ['id' => 14, 'cod' => 13, 'name' => 'CI Santiago del Estero' ,'IdTipoDocumento_CX' => 20, 'descripcion' => 'Ced.Ident.Santiago del Estero', 'abreviacion' => 'CISE'],
            ['id' => 15, 'cod' => 14, 'name' => 'CI Tucumán' ,'IdTipoDocumento_CX' => 21, 'descripcion' => 'Ced.Ident.Tucumán', 'abreviacion' => 'CITU'],
            ['id' => 16, 'cod' => 16, 'name' => 'CI Chaco' , 'IdTipoDocumento_CX' => 22, 'descripcion' => 'Ced.Ident.Chaco', 'abreviacion' => 'CICH'],
            ['id' => 17, 'cod' => 17, 'name' => 'CI Chubut' , 'IdTipoDocumento_CX' => 23, 'descripcion' => 'Ced.Ident.Chubut', 'abreviacion' => 'CICU'],
            ['id' => 18, 'cod' => 18, 'name' => 'CI Formosa' ,'IdTipoDocumento_CX' => 24, 'descripcion' => 'Ced.Ident.Formosa', 'abreviacion' => 'CIFO'],
            ['id' => 19, 'cod' => 19, 'name' => 'CI Misiones' , 'IdTipoDocumento_CX' => 25, 'descripcion' => 'Ced.Ident.Misiones','abreviacion' => 'CIMI'],
            ['id' => 20, 'cod' => 20, 'name' => 'CI Neuquén' ,'IdTipoDocumento_CX' => 26, 'descripcion' => 'Ced.Ident.Neuquén', 'abreviacion' => 'CINQ'],
            ['id' => 21, 'cod' => 21, 'name' => 'CI La Pampa' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 22, 'cod' => 22, 'name' => 'CI Río Negro' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 23, 'cod' => 23, 'name' => 'CI Santa Cruz' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 24, 'cod' => 24, 'name' => 'CI Tierra del Fuego' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 25, 'cod' => 80, 'name' => 'CUIT' , 'IdTipoDocumento_CX' => 9, 'descripcion' => 'C.U.I.T.','abreviacion' => 'CUIT'],
            ['id' => 26, 'cod' => 86, 'name' => 'CUIL' , 'IdTipoDocumento_CX' => 11, 'descripcion' => 'C.U.I.L.','abreviacion' => 'CUIL'],
            ['id' => 27, 'cod' => 87, 'name' => 'CDI' , 'IdTipoDocumento_CX' => 8, 'descripcion' => 'Documento de Identidad', 'abreviacion' => 'DI'],
            ['id' => 28, 'cod' => 89, 'name' => 'LE' ,'IdTipoDocumento_CX' => 3, 'descripcion' => 'Libreta de Enrolamiento','abreviacion' => 'LE'],
            ['id' => 29, 'cod' => 90, 'name' => 'LC' ,'IdTipoDocumento_CX' => 4, 'descripcion' => 'Libreta Cívica', 'abreviacion' => 'LC'],
            ['id' => 30, 'cod' => 91, 'name' => 'CI extranjera' , 'IdTipoDocumento_CX' => 10, 'descripcion' => 'Ident.Extranjera', 'abreviacion' => 'EXT'],
            ['id' => 31, 'cod' => 92, 'name' => 'en trámite' ,'IdTipoDocumento_CX' => 1, 'descripcion' => 'Sin Documento','abreviacion' => 'S/D'],
            ['id' => 32, 'cod' => 93, 'name' => 'Acta nacimiento' , 'IdTipoDocumento_CX' => 12, 'descripcion' => 'Acta de Nacimiento','abreviacion' => 'AN'],
            ['id' => 33, 'cod' => 94, 'name' => 'Pasaporte' , 'IdTipoDocumento_CX' => 7, 'descripcion' => 'Pasaporte', 'abreviacion' => 'PAS'],
            ['id' => 34, 'cod' => 95, 'name' => 'CI Bs. As. RNP' ,'IdTipoDocumento_CX' => 13, 'descripcion' => 'Ced.Ident.Bs.As.RNP', 'abreviacion' => 'CIBR'],
            ['id' => 35, 'cod' => 96, 'name' => 'DNI' , 'IdTipoDocumento_CX' => 2, 'descripcion' => 'Documento Nacional de Identidad', 'abreviacion' => 'DNI'],
            ['id' => 36, 'cod' => 99, 'name' => 'Sin identificar/venta global diaria' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],


            ['id' => 37, 'cod' => 30, 'name' => 'Certificado de Migración' , 'IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL],
            ['id' => 38, 'cod' => 88, 'name' => 'Usado por Anses para Padrón','IdTipoDocumento_CX' => NULL, 'descripcion' => NULL, 'abreviacion' => NULL]
        ));
        DB::connection()->getPdo()->exec('SET FOREIGN_KEY_CHECKS=1');
    }
}
