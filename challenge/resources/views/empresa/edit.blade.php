@extends('layouts.app')
@section('content')




<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header" style="background:#739F79; color:white">Editar empresa</div>
           

            <div class="card-body">
                <form method="POST" action="{{ route('empresa.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="empresa_id" value="{{$empresa->id}}" />

                <div class="form-group row">
                    <label for="nombre" class="col-md-3 col-form-label text-md-right">Nombre</label>
                    <div class="col-md-7">
                             
                        <input id="nombre" type="text" name="nombre" class="form-control"  value="{{$empresa->nombre}}"  required  /> 
               
                        @if($errors->has('nombre'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre')}}</strong>
                           </span>
                        @endif

                    </div>
                </div>


                <div class="form-group row">
                    <label for="cuit" class="col-md-3 col-form-label text-md-right">Cuit</label>
                    <div class="col-md-7">
                        <input id="cuit" type="text" name="cuit" class="form-control" value="{{$empresa->cuit}}"  required/>
                        @if($errors->has('cuit'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cuit')}}</strong>
                           </span>
                        @endif
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="provincia" class="col-md-3 col-form-label text-md-right">Provincia</label>
                    <div class="col-md-7">
                        <input id="provincia" type="text" name="provincia" class="form-control"  value="{{$empresa->provincia}}" required/>
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
                        <input id="localidad" type="text" name="localidad" class="form-control" value="{{$empresa->localidad}}" required/>
                        @if($errors->has('localidad'))
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('localidad')}}</strong>
                           </span>
                        @endif
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




@endsection