<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conceptos')->insert([
            ['id_cx' => 1, 'name' => 'Efectivo', 'table_account' => 3, 'max_importance' => 7],
            ['id_cx' => 2, 'name' => 'Cheque de 3ros', 'table_account' => 3, 'max_importance' => 7],
            ['id_cx' => 3, 'name' => 'Tarjetas de Crédito', 'table_account' => 4, 'max_importance' => 1],
            ['id_cx' => 4, 'name' => 'Bancos', 'table_account' => 4, 'max_importance' => 1],
            ['id_cx' => 5, 'name' => 'Cuenta Corriente Clientes', 'table_account' => 8, 'max_importance' => 1],
            ['id_cx' => 6, 'name' => 'Cuenta Corriente Proveedores', 'table_account' => 8, 'max_importance' => 1],
            ['id_cx' => 7, 'name' => 'Descuentos Generales Concedidos', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 8, 'name' => 'Recargos Generales Aplicados', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 9, 'name' => 'Venta de Mercadería', 'table_account' => 2, 'max_importance' => 7],
            ['id_cx' => 10, 'name' => 'Otros Conceptos Ventas', 'table_account' => 6, 'max_importance' => 3],
            ['id_cx' => 11, 'name' => 'Costo de Mercadería', 'table_account' => 5, 'max_importance' => 3],
            ['id_cx' => 12, 'name' => 'Mercadería', 'table_account' => 5, 'max_importance' => 3],
            ['id_cx' => 13, 'name' => 'IVA Ventas', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 15, 'name' => 'Impuestos Internos Ventas', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 17, 'name' => 'Retenciones', 'table_account' => 7, 'max_importance' => 3],
            ['id_cx' => 18, 'name' => 'IVA Compras', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 20, 'name' => 'Impuestos Internos Compras', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 21, 'name' => 'Percepciones', 'table_account' => 7, 'max_importance' => 3],
            ['id_cx' => 22, 'name' => 'Otros Conceptos Compras', 'table_account' => 6, 'max_importance' => 3],
            ['id_cx' => 23, 'name' => 'Descuentos Generales Conseguidos', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 24, 'name' => 'Recargos Generales', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 25, 'name' => 'Otros Conceptos Caja', 'table_account' => 6, 'max_importance' => 3],
            ['id_cx' => 26, 'name' => 'Otros Conceptos Bancos', 'table_account' => 6, 'max_importance' => 3],
            ['id_cx' => 27, 'name' => 'Otros Conceptos Stock', 'table_account' => 6, 'max_importance' => 3],
            ['id_cx' => 28, 'name' => 'Transferencia Caja', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 29, 'name' => 'IVA ND Banco', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 30, 'name' => 'IVA NC Banco', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 31, 'name' => 'Transferencia Stock', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 32, 'name' => 'Apertura Caja', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 33, 'name' => 'Cierre Caja', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 34, 'name' => 'Ajuste Saldo Cliente', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 35, 'name' => 'Ajuste Saldo Proveedor', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 36, 'name' => 'Recargo tarjetas', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 37, 'name' => 'Recargo cta.cte', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 38, 'name' => 'Descuento cta.cte', 'table_account' => 1, 'max_importance' => 1],
            ['id_cx' => 99, 'name' => 'Pre-Venta de Mercadería', 'table_account' => 2, 'max_importance' => 7],
            ['id_cx' => 9999, 'name' => '(Sin Concepto)', 'table_account' => 0, 'max_importance' => 0],
        ]);
    }
}
