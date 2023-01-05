@extends('layouts.app')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
          
            <div class="card">
                <div class="card-header" style="background:#30B0AA; color:white">{{ __('Usuarios') }}</div>

                <div class="card-body">
                  

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nick</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                          <tr>
                            <th scope="row">{{$usuario->id}}</th>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->surname}}</td>
                            <td>{{$usuario->nick}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                              
                             
                            
                             
                              <!-- Button to Open the Modal -->
  <a type="button" class="btn btn-danger btn-sm" href="{{ route('usuario.delete', ['id'=>$usuario->id])}}" >
      Borrar
      
    </a>
  
   
                                  <td>
                              
                          </tr>
                         
                         @endforeach
                        </tbody>
                      </table>
                
                </div>
            </div>
            <!--PAginación-->
            <div class="clearfix">
             {{$usuarios->links()}}
            </div>
            </div>
        
      

    </div>
</div>
@endsection
