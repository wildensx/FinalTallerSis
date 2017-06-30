<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{

    protected $table='detalle_ventas';

    protected $primaryKey="iddetalle_venta";

    public $timestamps=true;

    protected $fillable = [
        'idventa',
        'idarticulo',
        'cantidad',
        'precio_venta',
        'descuento'

    ];

    protected $guarded = [

    ];
}
