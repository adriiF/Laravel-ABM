@extends('layouts.app')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
          
            <div class="card">
                <div class="card-header" style="background:#739F79; color:white">{{ __('Empresas') }}</div>

                <div class="card-body">
                  

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cuit</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($empresas as $empresa)
                          <tr>
                            <th scope="row">{{$empresa->id}}</th>
                            <td>{{$empresa->nombre}}</td>
                            <td>{{$empresa->cuit}}</td>
                            <td>{{$empresa->provincia}}</td>
                            <td>{{$empresa->localidad}}</td>
                            <td>
                              
                            <a style="color: white" href="{{ route('empresa.editar',['id' => $empresa->id])}}" class="btn btn-sm btn-warning">Editar</a> 
                          
                           
                            <!-- Button to Open the Modal -->
<a type="button" class="btn btn-danger btn-sm" href="{{ route('empresa.delete', ['id'=>$empresa->id])}}">
    Borrar
    
  </a>

  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">¿Estas seguro?</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          Si eliminas esta empresa no podras recuperarla, ¿Estas seguro de queres eliminar?
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</a>
          <a href="{{ route('empresa.delete', ['id'=>$empresa->id])}}" class="btn btn btn-danger">Borrar definitivamente</a>
        </div>
  
      </div>
    </div>
  </div>
                                <td>
                            
                          </tr>
                         
                         @endforeach
                        </tbody>
                      </table>
                
                </div>
            </div>
            <!--PAginación-->
            <div class="clearfix">
             {{$empresas->links()}}
            </div>
            </div>
        
      

    </div>
</div>
@endsection
