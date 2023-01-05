<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
use App\Models\Empleado;
use App\Models\Sucursal;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class EmpleadoController extends Controller
{
 
   
    public $empresas =null;
    public $sucursa  = null;
 
    public $nombreEmpresa  = null;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $empresas = Empresa::all();
     
           return view('empleado.create',[
               'empresas' => $empresas,
               
           
               
           ]);

          
       }

    

       public function byEmpresa($id){
         //$sucursa=
     return  Sucursal::where('empresa_id', $id)->get();

            
       }

   
      


       public function save (Request $request){

            //Validación
            $validate = $this->validate($request, [
                'nombre'=> 'required',
                'apellido'=> 'required',
                //'dni'=> 'required',
                'provincia'=> 'required',
                'localidad'=>'required',
               // 'direccion'=>'required',
    
             ]);

             
               //Recoger datos del formulario
       $nombre = $request->input('nombre');
      $apellido = $request->input('apellido');
       $dni = $request->input('dni');

       $provincia = $request->input('provincia');
       $localidad = $request->input('localidad');
       $domicilio = $request->input('domicilio');
       $oculto = $request->input('sucursal_id');
       $empresa_id = (int)$request->empresa_id;
       $sucursal_id = (int)$request->sucursal_id;


    /*   var_dump($nombre);
      var_dump($apellido);
      var_dump($dni);
       var_dump($provincia);
       var_dump($localidad);
var_dump($domicilio);
       var_dump($empresa_id);
       var_dump($sucursal_id);

       die();
*/
            
       //Asignar valores al objet

$user = Auth::user();
$empleado= new Empleado();
$empleado->user_id = $user->id;
$empleado->empresa_id =$empresa_id;
$empleado->sucursal_id = $sucursal_id;
$empleado->nombre = $nombre;
$empleado->apellido = $apellido;
$empleado->dni = $dni;
$empleado->provincia = $provincia;
$empleado->localidad = $localidad;
$empleado->domicilio = $domicilio;



//Guardad en bd
$empleado->save();



return redirect()->route('empleado.list')
 ->with([
     
     'message'=> 'Empleado creado correctamente'

 ]);
    }


    public function listar(){
        
        $empleados = Empleado::orderBy('id', 'Asc')->paginate(5);
       
        return view('empleado.list',[
          'empleados' => $empleados
          
        ]);
    }


    public function delete($id){
        //conseguir usuario identificado
       $user = Auth::user();
        $empleado = Empleado::find($id);
        
        if($user ){
        $empleado->delete();
        $message = array('message' => "El registro se ha borrado correctamente.");
    }else{

      $message = array('message' => "El registro no se ha borrado.");
     }
    
    return redirect()->route('empleado.list')->with($message);
     

   }


   
   public function edit($id){
    $user = Auth::user();
    $empleado = Empleado::find($id);

    $empresas = Empresa::all();
    if($user && $empleado){
            return view ('empleado.edit',[
                'empleado'=>$empleado,
                'empresas'=>$empresas
            ]);
    }else{
        return redirect()->route('empleado.list');
    }

}

public function update(Request $request){

  
    $user = Auth::user();

   
$empleado_id = $request->input('empleado_id');
        $nombre = $request->input('nombre');
       $apellido = $request->input('apellido');
       $dni = $request->input('dni');
        $provincia = $request->input('provincia');
        $localidad = $request->input('localidad');
     $domicilio = $request->input('domicilio');
       $user_id = $user->id;
        $empresa_id = (int)$request->empresa_id;
        $sucursal_id = (int)$request->sucursal_id;



      var_dump($empleado_id);
       var_dump($nombre);
       var_dump($apellido);
      var_dump($provincia);
        var_dump($localidad);
        var_dump($user_id);
    var_dump($empresa_id);
      var_dump($sucursal_id);
        

        
          //CONSEGUIR OBJETO DE EMPLEADO    
          $empleado = Empleado::find($empleado_id);
          //setear valores
       
          $empleado->nombre = $nombre;
          $empleado->apellido = $apellido;
           $empleado->dni = $dni;
         $empleado->provincia = $provincia;
          $empleado->localidad = $localidad;
        $empleado->domicilio = $domicilio;
           $empleado->user_id = $user_id;
         $empleado->empresa_id = $empresa_id;
        $empleado->sucursal_id = $sucursal_id;

         //ACTUALIZAR REGISTRO
         $empleado->update();
         return redirect()->route('empleado.list')->with(['message'=>"Registro actualizado con exito"]);
}
}