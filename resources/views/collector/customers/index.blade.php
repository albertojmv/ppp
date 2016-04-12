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
         {!!Form::open(['route'=>'collector.customers.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}

        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    @if(count($customers) == 0)
                    <th><strong>No existen resultados</strong></th>
                    @else
                    <th>#</th>
                    <th>Nombre.:</th>
                    <th>Cédula.:</th>
                    <th>Nacionalidad.:</th>
                    <th>Creado por.:</th>
                 
                    <th>Ver.:</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}} {{$customer->lastname}}</td>
                    <td>{{$customer->cedula}}</td>
                    <td>{{$customer->country->name_es}}</td>
                    <td>{{$customer->user->name}}</td>
                    
                    
                    <td>
                        <a href="{{URL::to("collector/customer/".$customer->id)}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                    
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        {{$customers->links()}}
    </div>
</div>

@stop