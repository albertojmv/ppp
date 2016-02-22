@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-violet">
    <div class="panel-heading">Clientes</div>
    <div class="panel-body">
        <a href="{{URL::to("admin/customers/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    <th>Cédula.:</th>
                    <th>Nacionalidad.:</th>
                    <th>Editar.:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}} {{$customer->lastname}}</td>
                    <td>{{$customer->cedula}}</td>
                    <td>{{$customer->country->name_es}}</td>
                    <td>
                        <a href="{{URL::to("admin/customers/$customer->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$customers->links()}}
    </div>
</div>

@stop