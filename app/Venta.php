<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    protected $table='ventas';

    protected $primaryKey="idventa";

    public $timestamps=true;

    protected $fillable = [
        'idcliente',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_venta',
        'estado'

    ];

    protected $guarded = [

    ];
}
