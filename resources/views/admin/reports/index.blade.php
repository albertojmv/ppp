@extends('master.layout')

@section('contenido')

@if(\Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{\Session::get('message')}}
</div>
@endif

<div class="panel panel-red">
    <div class="panel-heading">
        Reportes</div>
    <div class="panel-body pan">
        <div class="form-body pal">
            

            <div class="btn-group" >
                
                <a href="{{URL::to("admin/quotesoverdue")}}" class="btn btn-green" role="button">Cuotas Vencidas</a>
                <a href="{{URL::to("admin/provinces")}}" class="btn btn-green" role="button">Cuotas Cobradas</a>
                <a href="{{URL::to("admin/formofpayments")}}" class="btn btn-green" role="button">Préstamos Saldados</a>
                
            </div>
          
            

        </div>
    </div>
</div>



@stop