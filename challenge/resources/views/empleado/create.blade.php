@extends('layouts.app')
@section('content')

    



<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header" style="background: #B3AF5F; color:white">Crear empleado</div>
           

            <div class="card-body">
                <form method="POST" action="{{route('empleado.save')}}" enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label for="nombre" class="col-md-3 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-7">
                        <input id="nombre" type="text" name="nombre" class="form-control" required/>
                        @if($errors->has('nombre'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellido" class="col-md-3 col-form-label text-md-right">Apellido</label>
                    <div class="col-md-7">
                        <input id="apellido" type="text" name="apellido" class="form-control" required/>
                        @if($errors->has('apellido'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('apellido')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dni" class="col-md-3 col-form-label text-md-right">Dni</label>
                    <div class="col-md-7">
                        <input id="dni" type="text" name="dni" class="form-control" required/>
                        @if($errors->has('dni'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dni')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>


               
 
                <div class="form-group row">
                    <label for="provincia" class="col-md-3 col-form-label text-md-right">Provincia</label>
                    <div class="col-md-7">
                        <input id="provincia" type="text" name="provincia" class="form-control" required/>
                        @if($errors->has('provincia'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('provincia')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="localidad" class="col-md-3 col-form-label text-md-right">Localidad</label>
                    <div class="col-md-7">
                        <input id="localidad" type="text" name="localidad" class="form-control" required/>
                        @if($errors->has('localidad'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('localidad')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="domicilio" class="col-md-3 col-form-label text-md-right">Domicilio</label>
                    <div class="col-md-7">
                        <input id="domicilio" type="text" name="domicilio" class="form-control" required/>
                        @if($errors->has('domicilio'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('domicilio')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>

              


                <div class="form-group row">
                    <label for="empresa_id" class="col-md-3 col-form-label text-md-right">Seleccionar empresa</label>
                    <div  class="col-md-7">
                      
                        <select  class="form-control" id="select-empresa" name="empresa_id">
                            <option value="">Selecciones un empresa </option>
                            @foreach($empresas as $empresa)
                <option value={{ $empresa->id }}>{{ $empresa->nombre}}</option>
                @endforeach
                        </select>
                    </div>
                </div>

              

              


                <div class="form-group row">
                    <label for="sucursal_id" class="col-md-3 col-form-label text-md-right">Sucursal</label>
                    <div  class="col-md-7">
                        <input id="oculto" type="hidden" name="sucursal_id" value="" />
                        <select  name="" class="form-control"  name="sucursal_id"  id="select-sucursal">
                            <option id="opcion" value="sucursal_id">Selecciones sucursal </option>
                           
                        </select>
                    </div>
                </div>

                






                <div class="form-group row">
                 
                    <div class="col-md-6 offset-md-3">
                        <input  type="submit"  class="btn btn-primary" value="Guardar"/>
                       
                    </div>
                </div>

                
                </form>
            </div>
        </div>

        </div>
    </div>
</div>
<link href="{{asset('js/jquery/jquery-3.6.3.min.js')}}" rel="stylesheet">

<script src="{{ asset('js/selectHTML.js') }}" defer></script>


@endsection

@section('scripts')



<script src="/js/selectHTML.js"></script>


@endsection