@extends('master.layout')
@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">Detalles del préstamo.</div>

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