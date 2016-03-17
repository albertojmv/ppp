@extends('master.layout')

@section('contenido')


<div class="panel panel-grey">
    <div class="panel-heading">
        Configuraciones</div>
    <div class="panel-body pan">
        <div class="form-body pal">
            <div class="alert alert-info"><strong>Aviso!</strong> Los cambios en las configuraciones pueden afectar el funcionamiento del sistema.</div>

            <div class="btn-group" >
                
                <a href="#" class="btn btn-primary" role="button">Países</a>
                <button type="button" class="btn btn-primary" style="background">Ciudades</button>
                <button type="button" class="btn btn-warning" style="background">Formas de Pago</button>
                <button type="button" class="btn btn-success" style="background">Tipos de garantía</button>
            </div>
          
            <a href="#" class="btn btn-success" role="button">Generar Mora</a>

        </div>
    </div>
</div>



@stop