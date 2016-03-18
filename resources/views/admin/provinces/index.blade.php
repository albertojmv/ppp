@extends('master.layout')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
<div class="panel panel-grey">
    <div class="panel-heading">
        Ciudades</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.provinces.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <div class="form-body pal">
           
 <a href="{{URL::to("admin/provinces/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    
                    <th>Editar.:</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($provinces as $province)
                <tr>
                    <td>{{$province->id}}</td>
                    <td>{{$province->name}}</td>
                   
                   
                    <td>
                        <a href="{{URL::to("admin/provinces/$province->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$provinces->links()}}
            
          
            

        </div>
    </div>
</div>

@stop