@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-yellow">
    <div class="panel-heading">Pagos</div>
    <div class="panel-body">
        <a href="{{URL::to("admin/payments/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Monto.:</th>
                    <th>Notas.:</th>
                    <th>Forma de pago.:</th>
                    <th>Editar.:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->id}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->notes}}</td>
                    <td>{{$payment->formofpayment->name}}</td>
                    <td>
                        <a href="{{URL::to("admin/payments/$payment->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$payments->links()}}
    </div>
</div>

@stop