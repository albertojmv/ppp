@extends('master.layout')

@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">Fotos de la garantía.</div>
    <div class="panel-body">
<a href="{{URL::to("admin/warranties/create?id=$id")}}" class="btn btn-orange"><img src="/images/editar.png">Agregar Nuevo</a>


{{$id}}


    </div>

</div>



@stop