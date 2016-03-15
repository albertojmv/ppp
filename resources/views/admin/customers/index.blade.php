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
         {!!Form::open(['route'=>'admin.customers.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}

        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <a href="{{URL::to("admin/customers/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    <th>Cédula.:</th>
                    <th>Nacionalidad.:</th>
                    <th>Editar.:</th>
                    <th>Crear Préstamo.:</th>
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
                    <td>
                        <a href="{{URL::to("admin/loans/create?id=$customer->id")}}" class="btn btn-blue"><img src="/images/add.png"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$customers->links()}}
    </div>
</div>

@stop