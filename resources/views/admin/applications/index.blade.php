@extends('master.layout')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
<div class="panel panel-info">
    <div class="panel-heading">
        Solicitudes de prestamos</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.applications.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <div class="form-body pal">
           
 <a href="{{URL::to("/")}}" class="btn btn-green"><img src="/images/editar.png">Agregar</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                     <th>Cedula.:</th>
                     <th>Telefono.:</th>
                     <th>Celular.:</th>
                    <th>Ver.:</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr>
                    <td>{{$application->id}}</td>
                    <td>{{$application->name}} {{$application->lastname}}</td>
                    <td>{{$application->cedula}}</td>
                   <td>{{$application->phone}}</td>
                   <td>{{$application->cellphone}}</td>
                    <td>
                        <a href="{{URL::to("admin/application/$application->id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$applications->links()}}
            
          
            

        </div>
    </div>
</div>

@stop