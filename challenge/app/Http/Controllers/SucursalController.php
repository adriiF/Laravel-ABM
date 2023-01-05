<?php

namespace App\Http\Controllers;


//use App\Models\Empresa;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
use GrahamCampbell\ResultType\Success;

class SucursalController extends Controller
{

   public  $valor;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
     $empresas = Empresa::all();
       
        return view('sucursal.create',[
            'empresas' => $empresas
            
            
        ]);
    }


    public function save (Request $request){


        $user = Auth::user();
        $empresa = new Empresa();
   
       

          //Recoger datos del formulario
       $nombre = $request->input('nombre');
       
       $provincia = $request->input('provincia');
       $localidad = $request->input('localidad');
       $empresa_id = (int)$request->empresa_id;
    
      // var_dump($request);
      /* var_dump($user->id);
      
      var_dump($empresa_id);
       var_dump( $nombre);
       var_dump($provincia );
       var_dump($localidad);
       die();
*/
//Asignar valores al objet

$user = Auth::user();
$sucursal= new Sucursal();

$sucursal->user_id = $user->id;
$sucursal->empresa_id =$empresa_id;
$sucursal->nombre = $nombre;
$sucursal->provincia = $provincia;
$sucursal->localidad = $localidad;
     
 //Guardad en bd
 $sucursal->save();

 return redirect()->route('sucursal.list')
 ->with([

     'message'=> 'Sucursal creada correctamente'

 ]);
    }


    public function listar(){
        // $empresas = Empresa::all();
        $sucursales = Sucursal::orderBy('id', 'desc')->paginate(5);
        return view('sucursal.list',[
          'sucursales' => $sucursales
        ]);
    }


    public function delete($id){
        //conseguir usuario identificado
        $user = Auth::user();
        $sucursal = Sucursal::find($id);
       // $empresa = Empresa::where('id',$empresa_id)->get();
       // $sucursales = Sucursal::where('empresa_id',$id)->get();
        
        

      if($user ){


          $sucursal->delete();
         $message = array('message' => "El registro se ha borrado correctamente.");
     }else{

       $message = array('message' => "El registro no se ha borrado.");
      }
     
     return redirect()->route('sucursal.list')->with($message);
      

    }
    public function edit($id){
        $user = Auth::user();
        $sucursal = Sucursal::find($id);

        $empresas = Empresa::all();

       
   

        if($user && $sucursal){
                return view ('sucursal.edit',[
                    'sucursal'=>$sucursal,
                    'empresas'=>$empresas
                ]);
        }else{
            return redirect()->route('sucursal.list');
        }

    }


    public function update(Request $request){
        $user = Auth::user();
       
         //VALIDACIÓN FORMULARIO
        $validate = $this->validate($request, [
            'nombre'=> 'required',
            'provincia'=> 'required',
            'localidad'=>'required'

         ]);

            
        $user = Auth::user();
        //$empresa = new Empresa();
   $sucursal = new Sucursal();
       

          //Recoger datos del formulario
        $user_id = $user->id;
        $suc_id =(int) $request->input('suc_id');
         $empresa_id = (int)$request->empresa_id;
        $nombre = $request->input('nombre');
        $provincia = $request->input('provincia');
        $localidad = $request->input('localidad');
    
 
    

        //CONSEGUIR OBJETO DE Sucursal
         $sucursal = Sucursal::find($suc_id);
         //setear valores
         $sucursal->user_id = $user_id;
         $sucursal->empresa_id = $empresa_id;
         $sucursal->nombre = $nombre;
         $sucursal->provincia = $provincia;
         $sucursal->localidad = $localidad;

         $valor=$empresa_id;
         
         //ACTUALIZAR REGISTRO
         $sucursal->update();
         return redirect()->route('sucursal.list')->with(['message'=>"Registro actualizado con exito"]);
       
     


    }



}

 
