@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-green">
    <div class="panel-heading">Garantías</div>
    <div class="panel-body">
         
        <a href="{{URL::to("admin/warrantydetail/create?id=".$_GET['search'])}}" class="btn btn-green"><img src="/images/editar.png">Agregar</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Artículo.:</th>
                    <th>Precio.:</th>
                    <th>Tipo de garantía.:</th>
                    <th>Detalles.:</th>
                    <th>Ver.:</th>
                    <th>Fotos.:</th>
                    <th>Editar.:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warranty_detail as $warranty)
                <tr>
                    <td>{{$warranty->id}}</td>
                    <td>{{$warranty->name}}</td>
                    <td>${{number_format($warranty->price)}}</td>
                    <td>{{$warranty->warranty->name}}</td>
                    <td>{{$warranty->notes}}</td>
                    
                    <td>
                        <a href="{{URL::to("admin/loan/$warranty->id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                    <td>
                        <a href="{{URL::to("admin/warranty/$warranty->id")}}" class="btn btn-orange"><img src="/images/cam.png"></a>
                    </td>
                    <td>
                        <a href="{{URL::to("admin/loans/$warranty->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$warranty_detail->links()}}
    </div>
</div>

@stop