<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    //Relacion de muchos a uno
     //muchas sucursales pudieron ser cargadas por unico usuario
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
     }

     public function empresa(){
      return $this->belongsTo('App\Models\Empresa', 'empresa_id');
   }

   public function sucursal(){
    return $this->belongsTo('App\Models\Sucursal', 'sucursal_id');
 }
   


   }
  