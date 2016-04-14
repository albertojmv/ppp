@extends('master.layout')
@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">Detalles del préstamo.</div>

    
    
    
    
    <div class="panel-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    
                    
                    <th>Forma de Pago</th>
                   
                    <th>Monto</th>
                    <th>% de interés</th>
                
                    <th># Cuotas</th>
                    <th>Tipo de Calculo</th>
                    <th>Fecha de inicio</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                   
                    
                    <td>{{$paymentmethod_id}}</td>
               
                    <td><p>${{number_format($amount, 2, '.', ',')}}</p></td>
                    <td>{{$interest}}</td>
                   
                    <td>{{$quotas}}</td>
                    <td>{{$calculationtype_id}}</td>
                    <td>{{$date}}</td>
                    
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
                    <th>Fecha de pago</th>
                    <th>Saldo</th>
                    <th>Interés</th>
                </tr>
            </thead>
            <tbody>
                @foreach($array as $arra)
                <tr>
                    <td>{{$arra['number']}}</td>
                    <td>${{number_format($arra['amount'], 2, '.', ',')}}</td>
                    <td>{{$arra['datepayment']}}</td>
                    <td>${{number_format($arra['capital'], 2, '.', ',')}}</td>
                    <td>${{number_format($arra['interest'], 2, '.', ',')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection