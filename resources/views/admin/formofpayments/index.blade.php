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
        Formas de pago</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.formofpayments.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <div class="form-body pal">
           
 <a href="{{URL::to("admin/formofpayments/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre.:</th>
                    
                    <th>Editar.:</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($formofpayments as $formofpayment)
                <tr>
                    <td>{{$formofpayment->id}}</td>
                    <td>{{$formofpayment->name}}</td>
                   
                   
                    <td>
                        <a href="{{URL::to("admin/formofpayments/$formofpayment->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$formofpayments->links()}}
            
          
            

        </div>
    </div>
</div>

@stop