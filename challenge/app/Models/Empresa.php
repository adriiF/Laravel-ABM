<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //use HasFactory;

     protected $table = 'empresas';
     
     
 public function sucursales(){
     return $this->hasMany('App\Models\Sucursal');
   }

public function sucursal(){
  return $this->belongsTo('App\Models\Sucursal', 'sucursal_id');
}


}