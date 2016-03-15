@extends('master.layout')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-green">
    <div class="panel-heading">Fotos de la garantía.</div>
    <div class="panel-body">
        <a href="{{URL::to("admin/warranties/create?id=$id")}}" class="btn btn-orange"><img src="/images/editar.png">Agregar</a>




        <div class="row">
            @foreach($imagenes as $imagen)
            <div class="col-sm-6 col-md-3">
                <a href="/warranties/{{$imagen->name}}" class="thumbnail">
                    <img src="/warranties/{{$imagen->name}}" alt="{{$imagen->name}}">
                </a>
                <p>{{$imagen->description}}</p>
               
                {!!Form::open(['route'=>['admin.warranties.destroy',$imagen->id ], 'method'=>'DELETE'])!!}
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro quieres eliminar esta imagen?')">Eliminar</button>
                {!!Form::close()!!}
            </div>
            @endforeach
        </div>




    </div>

</div>



@stop