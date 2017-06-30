<?php

namespace FinalSis;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table='categorias';

     protected $primaryKey="idcategoria";

     public $timestamps=true;

     protected $fillable = [
         'nombre',
         'descripcion',
         'condicion',

     ];

     protected $guarded = [

     ];
}
