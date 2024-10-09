<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CondicionIvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condicion_ivas')->insert([
            ['id' => 1,  'cod' => 1, 'name' => 'IVA Responsable Inscripto', 'IdSituacionIva_cx' => 2, 'MaximoImporte' => 0],
            ['id' => 2,  'cod' => 2, 'name' => 'IVA Responsable no Inscripto', 'IdSituacionIva_cx' => 3, 'MaximoImporte' => 0],
            ['id' => 3,  'cod' => 3, 'name' => 'IVA no Responsable', 'IdSituacionIva_cx' => 5, 'MaximoImporte' => 0],
            ['id' => 4,  'cod' => 4, 'name' => 'IVA Sujeto Exento', 'IdSituacionIva_cx' => 4, 'MaximoImporte' => 0],
            ['id' => 5,  'cod' => 5, 'name' => 'Consumidor Final', 'IdSituacionIva_cx' => 1, 'MaximoImporte' => 1000],
            ['id' => 6,  'cod' => 6, 'name' => 'Responsable Monotributo', 'IdSituacionIva_cx' => 6, 'MaximoImporte' => 0],
            ['id' => 7,  'cod' => 7, 'name' => 'Sujeto no Categorizado', 'IdSituacionIva_cx' => 7, 'MaximoImporte' => 0],
            ['id' => 8,  'cod' => 8, 'name' => 'Proveedor del Exterior', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 9,  'cod' => 9, 'name' => 'Cliente del Exterior', 'IdSituacionIva_cx' => 8, 'MaximoImporte' => 0],
            ['id' => 10, 'cod' => 10, 'name' => 'IVA Liberado – Ley Nº 19.640', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 11, 'cod' => 11, 'name' => 'IVA Responsable Inscripto – Agente de Percepción', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 12, 'cod' => 12, 'name' => 'Pequeño Contribuyente Eventual', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 13, 'cod' => 13, 'name' => 'Monotributista Social', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 14, 'cod' => 14, 'name' => 'Pequeño Contribuyente Eventual Social', 'IdSituacionIva_cx' => 0, 'MaximoImporte' => 0],
            ['id' => 15, 'cod' => 0, 'name' => 'Responsable M', 'IdSituacionIva_cx' => 9, 'MaximoImporte' => 0],
        ]
        );
    }
}
