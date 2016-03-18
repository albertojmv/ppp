@extends('master.layout')

@section('contenido')

<div class="panel panel-grey">
    <div class="panel-heading">
        Países</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.countries.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <div class="form-body pal">
           
 <a href="{{URL::to("admin/countries/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    
                    <th>Editar.:</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr>
                    <td>{{$country->id}}</td>
                    <td>{{$country->name_es}}</td>
                   
                   
                    <td>
                        <a href="{{URL::to("admin/countries/$country->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$countries->links()}}
            
          
            

        </div>
    </div>
</div>

@stop