@extends('master.layout')

@section('contenido')

@if(\Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{\Session::get('message')}}
</div>
@endif

<div class="panel panel-grey">
    <div class="panel-heading">
        Configuraciones</div>
    <div class="panel-body pan">
        <div class="form-body pal">
            <div class="alert alert-info"><strong>Aviso!</strong> Los cambios en las configuraciones pueden afectar el funcionamiento del sistema.</div>

            <div class="btn-group" >
                
                <a href="{{URL::to("admin/countries")}}" class="btn btn-primary" role="button">Países</a>
                <a href="{{URL::to("admin/provinces")}}" class="btn btn-primary" role="button">Ciudades</a>
                <a href="{{URL::to("admin/formofpayments")}}" class="btn btn-warning" role="button">Formas de Pago</a>
                <a href="{{URL::to("admin/typeswarranties")}}" class="btn btn-success" role="button">Tipos de garantía</a>
                <a href="{{URL::to("admin/corrermora")}}" class="btn btn-blue" role="button" onclick="return confirm('¿Seguro quieres ejecutar el proceso de calcular mora?')">Generar Mora</a>
            </div>
          
            

        </div>
    </div>
</div>



@stop