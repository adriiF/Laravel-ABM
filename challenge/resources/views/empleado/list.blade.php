@extends('layouts.app')

@section('content')
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')
          
            <div class="card">
                <div class="card-header" style="background: #B3AF5F; color:white">{{ __('Empleados') }}</div>

                <div class="card-body">
                  

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dni</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">sucursal</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                          <tr>
                            <th scope="row">{{$empleado->id}}</th>
                            <td>{{$empleado->nombre}}</td>
                            <td>{{$empleado->dni}}</td>
                            <td>{{$empleado->provincia}}</td>
                            <td>{{$empleado->localidad}}</td>
                            <td>{{$empleado->empresa->nombre}}</td>
                            
                            
                            @if($empleado->sucursal)
                             <td>
                            {{$empleado->sucursal->nombre}}
                            </td>
                            
                                
                            @else
                            <td>-</td>
                            
                          
                            @endif
                            
                          <td>
                      
  <a style="color: white" href="{{ route('empleado.editar',['id' => $empleado->id])}}"  class="btn btn-sm btn-warning">Editar</a> 
  
                          <!-- Button to Open the Modal -->
<a type="button" href="{{route('empleado.delete', ['id'=>$empleado->id])}}" class="btn btn-danger btn-sm">
  Borrar
  
</a>

</td>
                            
</tr>

@endforeach
</tbody>
</table>
    
</div>
</div>
<!--PAginación-->

<div class="clearfix">
{{$empleados->links()}}
</div>
</div>



</div>
</div>

@endsection