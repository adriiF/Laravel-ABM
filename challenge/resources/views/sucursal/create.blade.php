@extends('layouts.app')
@section('content')









<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header" style="background: #C37097; color:white">Crear sucursal</div>
           

            <div class="card-body">
                <form method="POST" action="{{ route('sucursal.save')}}" enctype="multipart/form-data">
                @csrf


                




                <div class="form-group row">
                    <label for="nombre" class="col-md-3 col-form-label text-md-right">Seleccionar empresa</label>
                    <div  class="col-md-7">
                       
                        <select class="form-control" name="empresa_id">
                            @foreach($empresas as $empresa)
                <option value={{ $empresa->id }}>{{ $empresa->nombre}}</option>
                @endforeach
                        </select>
                    </div>
                </div>









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