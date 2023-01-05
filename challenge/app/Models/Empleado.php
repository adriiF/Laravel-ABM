<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //use HasFactory;
    protected $table= 'empleados';

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
     }

     //una empresa tiene muchos empleados
     public function empresa(){
        return $this->belongsTo('App\Models\Empresa', 'empresa_id');
     }  

     public function sucursal(){
        return $this->belongsTo('App\Models\Sucursal');
     }
     public function sucursales(){
      return $this->hasMany('App\Models\Sucursal');
    }
 
}
