@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-violet">
    <div class="panel-heading">Referencias</div>
    <div class="panel-body">

        <a href="{{URL::to("admin/references/create?id=".$_GET['search'])}}" class="btn btn-green"><img src="/images/editar.png">Agregar</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teléfono.:</th>
                    <th>Nombre.:</th>
                    <th>Dirección.:</th>
                    <th>Provincia.:</th>
                  
                    <th>Ver.:</th>
                    <th>Editar.:</th>
                    <th>Eliminar .:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($references as $reference)
                <tr>
                    <td>{{$reference->id}}</td>
                    <td>{{$reference->phone}}</td>
                    <td>{{$reference->name}}</td>
                    <td>{{$reference->address}}</td>
                    <td>{{$reference->province->name}}</td>

                   
                    <td>
                        <a href="{{URL::to("admin/references/$reference->id")}}" class="btn btn-orange"><img src="/images/view.png"></a>
                    </td>
                    <td>
                        <a href="{{URL::to("admin/references/$reference->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                    <td>
                        {!!Form::open(['route'=>['admin.references.destroy',$reference->id ], 'method'=>'DELETE'])!!}
                       
                        <input type="image" name="imageField" src="/images/borrar.png" class="btn btn-danger" onclick="return confirm('¿Seguro quieres eliminar esta referencia?')" />
                        {!!Form::close()!!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$references->links()}}
    </div>
</div>

@stop