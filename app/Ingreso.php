<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{

    protected $table='ingresos';

    protected $primaryKey="idingreso";

    public $timestamps=true;

    protected $fillable = [
        'idproveedor',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'

    ];

    protected $guarded = [

    ];
}
