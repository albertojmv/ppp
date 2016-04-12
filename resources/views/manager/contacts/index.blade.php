@extends('master.layout')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
<div class="panel panel-danger">
    <div class="panel-heading">
        Mensajes de clientes</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'manager.contacts.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <div class="form-body pal">
          
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    <th>Correo.:</th>
                    <th>Mensajes.:</th>
                    <th>Fecha.:</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->created_at->format('d-m-Y h:i:s A')}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$contacts->links()}}
            
          
            

        </div>
    </div>
</div>

@stop