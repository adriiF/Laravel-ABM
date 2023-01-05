@extends('layouts.app')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
          
            <div class="card">
                <div class="card-header" style="background: #C37097; color:white" >{{ __('Sucursales') }}</div>

                <div class="card-body">
                  

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            
                            <th scope="col">Sucursal</th>
                            <th scope="col">Empresa</th>

                            <th scope="col">Provincia</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sucursales as $sucursal)
                          <tr>
                           
                            <td>{{$sucursal->nombre}}</td>
                            <td>{{$sucursal->empresa->nombre}}</td>
                            <td>{{$sucursal->provincia}}</td>
                            <td>{{$sucursal->localidad}}</td>
                            <td>
                              
                            <a style="color: white" href="{{ route('sucursal.editar',['id' => $sucursal->id])}}" class="btn btn-sm btn-warning">Editar</a> 
                          
                           
                            <!-- Button to Open the Modal -->
<a type="button" class="btn btn-danger btn-sm" href="{{ route('sucursal.delete', ['id'=>$sucursal->id])}}" >
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
             {{$sucursales->links()}}
            </div>
            </div>
        
      

    </div>
</div>
@endsection
