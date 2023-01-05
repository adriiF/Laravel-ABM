<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\User;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   

     public function config(){
            return view('user.config');
        }



           //recibir datos del formulario configuración
           public function update(Request $request){
           
            //Conseguir el usuario identificado
            $user = Auth:: user();
               $id = $user->id;

             //validación del formulario
             $validate = $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],

             ]);

        //Recoger datos del formulario
            $name = $request->input('name');
            $surname = $request->input('surname');
            $nick = $request->input('nick');
            $email = $request->input('email');

          //Asignar nuevos valores al objeto del usuario
          $user->name = $name;
          $user->surname = $surname;
          $user->nick = $nick;
          $user->email = $email;


             //Subir la imagen
             $image_path = $request->file('image_path');
            if($image_path){
                //Poner nombre unico
                $image_path_name = time().$image_path->getClientOriginalName();

                //Guardar en la carpeta (storage/app/users)
                Storage::disk('users')->put( $image_path_name, File::get($image_path));

                 //seteo el nombre de la imagen en el objeto
                $user->image = $image_path_name;
            }
   
         

          //Ejecutar consulta y cambios en la base de datos

              $user->update();
              return redirect()->route('home')
              ->with(['message'=>'Usuario actualizado correctamente']);



           }
      //Sacar imagen del storage
           public function getImage($filename){
                $file = Storage::disk('users')->get($filename);
                return new Response($file, 200);
           }

           public function profile($id){
            $user = User::find($id);
            return view('user.profile',[
                'user'=> $user
            ]);
           }


           public function listar(){
            // $empresas = Empresa::all();
            $usuarios = User::orderBy('id', 'Asc')->paginate(5);
            return view('user.list',[
              'usuarios' => $usuarios
            ]);
        }



        public function delete($id){
            //conseguir usuario identificado
            $user = Auth::user();
            $usuario = User::find($id);
           // $empleados = Empleado::where('empresa_id',$id)->get();
           // $sucursales = Sucursal::where('empresa_id',$id)->get();
            
            
    
          if($user ){
    /*
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
    
              */
    
              $usuario->delete();
             $message = array('message' => "El usuario se ha borrado correctamente.");
         }else{
    
           $message = array('message' => "El registro no se ha borrado.");
          }
         
         return redirect()->route('usuario.list')->with($message);
          
    
        }

}
