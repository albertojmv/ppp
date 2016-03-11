@extends('master.layout')

@section('contenido')

@include('alerts.request')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-yellow">
    <div class="panel-heading">Pagos</div>
    <div class="panel-body">
        {!!Form::open(['route'=>'admin.payments.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}

        <div class="form-group">
            <input type="text" name="id" class="form-control" placeholder="Buscar" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <a href="{{URL::to("admin/payments/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Monto.:</th>

                    <th>Prestamo.:</th>
                    <th>Forma de pago.:</th>
                    <th>Notas.:</th>
                    <th>Imprimir .:</th>
                    <th>Editar.:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->id}}</td>
                    <td>${{number_format($payment->amount)}}</td>

                    <td>{{$payment->quota->loan_id}}</td>
                    <td>{{$payment->formofpayment->name}}</td>
                    <td>{{$payment->notes}}</td>
                    <td>
                        <a href="{{URL::to("admin/payment/$payment->id")}}" class="btn btn-blue" target="_blank"><img src="/images/print.png"></a>
                    </td>
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