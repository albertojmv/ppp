@extends('master.layout')

@section('contenido')

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
                    <td>1</td>
                    <td>Juan Perez</td>
                    <td>Mensual</td>
                    <td>23</td>
                    <td>10000</td>
                    <td>10</td>
                    <td>10</td>
                    <td>5</td>
                    <td>Interes fijo</td>
                    <td>01-02-2017</td>
                    <td><span class="label label-sm label-success">Approved</span></td>
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
                    <th>Cobrado</th>
                    <th>Vence el</th>
                    <th>Capital</th>
                    <th>Interés</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1000</td>
                    <td>100</td>
                    <td>1100</td>
                    <td>1100</td>
                    <td>02-03-2017</td>
                    <td>1000</td>
                    <td>100</td>
                    <td><span class="label label-sm label-success">Approved</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    
    
    
</div>






@stop