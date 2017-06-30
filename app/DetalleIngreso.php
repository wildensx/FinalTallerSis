<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{

    protected $table='detalle_ingresos';

    protected $primaryKey="iddetalle_ingreso";

    public $timestamps=true;

    protected $fillable = [
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta'

    ];

    protected $guarded = [

    ];
}
