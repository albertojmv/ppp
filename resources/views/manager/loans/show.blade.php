@extends('master.layout')

@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
<div class="panel panel-green">
    <div class="panel-heading">Detalles del préstamo.</div>
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Forma de Pago</th>
                    <th>Días de gracia</th>
                    <th>Monto emitido</th>
                    <th>% de interés</th>
                    <th>% de Mora</th>
                    <th># Cuotas</th>
                    <th>Tipo de Calculo</th>
                    <th>Fecha de Entrega</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$prestamo->id}}</td>
                    <td>{{$prestamo->customer->name}} {{$prestamo->customer->lastname}}</td>
                    <td>{{$prestamo->paymentmethod->name}}</td>
                    <td>{{$prestamo->payday}}</td>
                    <td><p>${{number_format($prestamo->amount)}}</p></td>
                    <td>{{$prestamo->interest}}</td>
                    <td>{{$prestamo->surcharge}}</td>
                    <td>{{$prestamo->quotas}}</td>
                    <td>{{$prestamo->calculationtype->name}}</td>
                    <td>{{$prestamo->delivery->format('d-m-Y')}}</td>
                    @if($prestamo->loanstatu->id == 1)
                    <td><span class="label label-sm label-blue">{{$prestamo->loanstatu->name}}</span></td>
                    @else
                    <td><span class="label label-sm label-success">{{$prestamo->loanstatu->name}}</span></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
    
    
    
    
    
    <div class="panel-body">
        <h3>Detalles de cuotas.</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Monto</th>
                    <th>Mora</th>
                    <th>Total</th>
                    
                    <th>Vence el</th>
                    <th>Saldo</th>
                    <th>Interés</th>
                    <th>Estado</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($cuotas as $cuota)
                <tr>
                    <td>{{$cuota->number}}</td>
                    <td>${{number_format($cuota->amount, 2, '.', ',')}}</td>
                    <td>${{number_format($cuota->surcharge, 2, '.', ',')}}</td>
                    <td>${{number_format($cuota->amount + $cuota->surcharge, 2, '.', ',')}}</td>
                   
                    <td>{{$cuota->getFecha()}}</td>
                    <td>${{number_format($cuota->capital, 2, '.', ',')}}</td>
                    <td>${{number_format($cuota->interest, 2, '.', ',')}}</td>
                    @if($cuota->quotastatu->id == 1)
                    <td><span class="label label-sm label-blue">{{$cuota->quotastatu->name}}</span></td>
                    @elseif($cuota->quotastatu->id == 2)
                    <td><span class="label label-sm label-red">{{$cuota->quotastatu->name}}</span></td>
                    @else
                    <td><span class="label label-sm label-success">{{$cuota->quotastatu->name}}</span></td>
                    @endif
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    
    
    
</div>






@stop