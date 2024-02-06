<?php

namespace DuxDucisArsen\Commons\Models;

use DuxDucisArsen\Commons\Models\Concepto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * sum_stock: -1 resta, 1 suma, 0 no hace nada: ej prespuesto
 * sum_cash: -1 resta, 1 suma, 0 no hace nada: ej prespuesto
 *
 *
 * Los id < 200 mueves cuenta corriente, ejemplo Mostrodor es 215, no se incluye en saldos CtaCte
 */
class VoucherClass extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public const LIST_IDS_DEBIT_CREDIT_BANCARIO = '530,531, 520,521';
    public const ID_DEBITO_CREDITO_BANCARIOS = [530, 531, 520, 521];

    public const VOUCHER_CLASS_ID_AJUSTE_STOCK = [1005, 1006];

    public const ID_ENVIO_STOCK = 1030;

    public const ID_RECEPCION_STOCK = 1020;

    public const VOUCHER_CLASS_ID_NO_TIENEN_TOTAL = [150, 151, 302, 350, 351, 2210, 2211, 172, 372];

    public const VOUCHER_CLASS_ID_RECIBO = [150];

    public const VOUCHER_CLASS_ID_RECIBO_Y_ANULACION = [150, 151, 160, 161]; //160 son cobranza y anula. no se que son en Cx

    public const ID_TRANSF_BANCARIA = [550, 551];

    public const ID_CASH_SHIFT_TIENEN_CHECK = '2020,2030,2010,2011,2001'; // Transf de caja, salidas, anul. entradas,anul entrada

    public const ID_ND_Y_NC_TIENEN_CHECKS = '130,131,151'; // ND y sus anulacions

    public const VOUCHER_CLASS_ID_PAGOS_Y_ANULACION = [350, 351, 2210, 2211, 2300, 2301];

    public const VOUCHER_CLASS_ID_PRESUPUESTO = [200];

    public const FACT_Y_NC_COMPRA_VENTA = [100, 101, 140, 141, 300, 301, 310, 320];

    const ADELANT_ID = 10280;

    const ID_MAINTENANCE_NOTICE = 10000;

    const ID_MAINTENANCE_NOTICE_ANULA = 10001;

    const ID_MAINTENANCE_ORDER = 10369;

    const ID_ANULACION_MAINTENANCE_ORDER = 10370;

    // -- VENTA Fact/NC FactLote/NCLote Liq/ALiquidacion  Ticket/AnTicket ND/NC NC/F --
    const IDS_FACTURACION = [100, 101, 102, 103, 105, 106, 110, 120, 130, 131, 140, 141];

    const IDS_CARD_LIQUIDATION = [570, 572, 580];

    const ID_LIQ_TARJ_VTA_CRE = 572;

    const IDS_FACTURACION_VENTA_COMPRA = [100, 101, 102, 103, 105, 106, 110, 120, 130, 131, 140, 141, 300, 301, 310, 320, 330, 331, 340, 341];

    /**
     * Lo saqué de CX
     */
    const IDS_TIENEN_CAE_VENTAS = [100, 101, 102, 103, 110, 120, 130, 131, 140, 141];

    const IDS_TIENEN_CAE_COMPRAS = [305, 306];

    const ID_FACTURA_VENTA = [100, 141]; // F directa, y anulac de NC

    const ID_NC_VENTA = [101, 131, 140]; // NC directa, anula Fac, y anula ND

    const ID_ND_VENTA = [130]; // ND directa

    const ID_IMPORTE_USAN_SUBTOTAL2 = [130, 131, 330, 331]; // Cuando saco el importe para la CteCte

    const ID_SALIDA_CAJA = 2010;

    const ADELANTO_ID = 0;

    const ID_KILOMETERS_RECORD = 10373;

    /**
     * Son las que requieren QR, con cod de AFIP,
     */
    const AFIP_ID_FACTURA_A = 1;


    const AFIP_ID_FACTURA_B = 6;

    const AFIP_ID_FACTURA_C = 11;

    const AFIP_ID_ND_A = 2;

    const AFIP_ID_ND_B = 7;

    const AFIP_ID_ND_C = 12;

    const AFIP_ID_NC_A = 3;

    const AFIP_ID_NC_B = 8;

    const AFIP_ID_NC_C = 13;

    public const ID_COMMISSION = 2300;

    public const ID_COMMISSION_ANULA = 10368;

    /**
     * RELATIONS
     */
    public function voucherClassAnula()
    {
        return $this->belongsTo(VoucherClass::class, 'voucher_class_anula_id');
    }

    public function conceptos(): BelongsToMany
    {
        return $this->belongsToMany(Concepto::class, 'concepto_voucher_classes', 'voucher_class_id', 'concepto_cx_id', 'id', 'id_cx')->withPivot('debit_credit');
    }


    /**
     * CLASE X: tiene el campo LEtra por un lado y el voucher class por otro. Ejemplo Factura y la letter está en ClienteComp
     * AFIP:
     *
     * @return int | null
     */
    public static function getAfipId($voucherClassId, $letter): mixed
    {
        $tipoCmpAFIP = null;
        switch ($letter) {
            case 'A':
                $tipoCmpAFIP =
                    in_array($voucherClassId, VoucherClass::ID_FACTURA_VENTA)
                    ? VoucherClass::AFIP_ID_FACTURA_A
                    : (in_array($voucherClassId, VoucherClass::ID_NC_VENTA)
                        ? VoucherClass::AFIP_ID_NC_A
                        : (in_array($voucherClassId, VoucherClass::ID_ND_VENTA)
                            ? VoucherClass::AFIP_ID_ND_A
                            : null
                        )
                    );
                break;
            case 'B':
                $tipoCmpAFIP =
                    in_array($voucherClassId, VoucherClass::ID_FACTURA_VENTA)
                    ? VoucherClass::AFIP_ID_FACTURA_B
                    : (in_array($voucherClassId, VoucherClass::ID_NC_VENTA)
                        ? VoucherClass::AFIP_ID_NC_B
                        : (in_array($voucherClassId, VoucherClass::ID_ND_VENTA)
                            ? VoucherClass::AFIP_ID_ND_B
                            : null
                        )
                    );
                break;
            case 'C':
                $tipoCmpAFIP =
                    in_array($voucherClassId, VoucherClass::ID_FACTURA_VENTA)
                    ? VoucherClass::AFIP_ID_FACTURA_C
                    : (in_array($voucherClassId, VoucherClass::ID_NC_VENTA)
                        ? VoucherClass::AFIP_ID_NC_C
                        : (in_array($voucherClassId, VoucherClass::ID_ND_VENTA)
                            ? VoucherClass::AFIP_ID_ND_C
                            : null
                        )
                    );
                break;
        }

        return $tipoCmpAFIP;
    }
}