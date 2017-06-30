<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulos';

    protected $primaryKey="idarticulo";

    public $timestamps=true;

    protected $fillable = [
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'

    ];

    protected $guarded = [

    ];

}
