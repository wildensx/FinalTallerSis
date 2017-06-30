<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';

    protected $primaryKey="idpersona";

    public $timestamps=true;

    protected $fillable = [
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email'

    ];

    protected $guarded = [

    ];
}
