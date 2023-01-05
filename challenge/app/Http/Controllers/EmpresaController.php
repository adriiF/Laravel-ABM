<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Empleado;
use App\Models\Sucursal;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('empresa.create');
    }


    public function save (Request $request){

        



      //  var_dump($request);
       // die();

        //Validación
         $validate = $this->validate($request, [
            'nombre'=> 'required',
            'cuit'=> 'required',
            'provincia'=> 'required',
            'localidad'=>'required'

         ]);

         //Recoger datos del formulario
       $nombre = $request->input('nombre');
       $cuit = $request->input('cuit');
       $provincia = $request->input('provincia');
       $localidad = $request->input('localidad');

      /* var_dump($nombre);
       var_dump($cuit);
       var_dump($provincia);
       var_dump($localidad);

       die();*/
       
   //Asignar valores nuevo objeto

            $user = Auth::user();
         $empresa = new Empresa();

         $empresa->user_id = $user->id;
         $empresa->nombre = $nombre;
         $empresa->cuit = $cuit;
         $empresa->provincia = $provincia;
         $empresa->localidad = $localidad;


       // var_dump($user->id);
        // var_dump($empresa);

        //Guardad en bd
        $empresa->save();

        return redirect()->route('empresa.list')
        ->with([

            'message'=> 'Empresa creada correctamente'

        ]);

    }

    public function listar(){
        // $empresas = Empresa::all();
        $empresas = Empresa::orderBy('id', 'Asc')->paginate(5);
        return view('empresa.list',[
          'empresas' => $empresas
        ]);
    }

    public function delete($id){
        //conseguir usuario identificado
        $user = Auth::user();
        $empresa = Empresa::find($id);
        $empleados = Empleado::where('empresa_id',$id)->get();
        $sucursales = Sucursal::where('empresa_id',$id)->get();
        
        

      if($user ){

             //eliminar empleados
             if($empleados && count($empleados)>=1){
                foreach($empleados as $empleado){
                    $empleado->delete();
                }
             }

              //eliminar sucursales
              if($sucursales && count($sucursales)>=1){
                foreach($sucursales as $sucursal){
                    $sucursal->delete();
                }
             }

          

          $empresa->delete();
         $message = array('message' => "El registro se ha borrado correctamente.");
     }else{

       $message = array('message' => "El registro no se ha borrado.");
      }
     
     return redirect()->route('empresa.list')->with($message);
      

    }

    public function edit($id){
        $user = Auth::user();
        $empresa = Empresa::find($id);


        if($user && $empresa){
                return view ('empresa.edit',[
                    'empresa'=>$empresa
                ]);
        }else{
            return redirect()->route('empresa.list');
        }

    }
    public function update(Request $request){
        $user = Auth::user();
       
         //VALIDACIÓN FORMULARIO
        $validate = $this->validate($request, [
            'nombre'=> 'required',
            'cuit'=> 'required',
            'provincia'=> 'required',
            'localidad'=>'required'

         ]);

       //Recoger datos del formulario
        $user_id = $user->id;
        $empresa_id = $request->input('empresa_id');
        $nombre = $request->input('nombre');
        $cuit = $request->input('cuit');
        $provincia = $request->input('provincia');
        $localidad = $request->input('localidad');

        //CONSEGUIR OBJETO DE EMPRESA
         $empresa = Empresa::find($empresa_id);
         //setear valores
         $empresa->user_id = $user_id;
         $empresa->nombre = $nombre;
         $empresa->cuit = $cuit;
         $empresa->provincia = $provincia;
         $empresa->localidad = $localidad;
         
         //ACTUALIZAR REGISTRO
         $empresa->update();
         return redirect()->route('empresa.list')->with(['message'=>"Registro actualizado con exito"]);
       
     


    }
}
