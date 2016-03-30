@extends('master.layout')
@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">Cuotas Cobradas</div>
    <div class="panel-body">
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    @if(count($cuotas) == 0)
                    <th><strong>No existen resultados</strong></th>
                    @else
                    <th># Prestamo</th>
                    <th># Cuota.:</th>
                    <th>Monto.:</th>
                    <th>Mora.:</th>
                    <th>Total.:</th>
                    <th>Fecha de pago.:</th>
                    <th>Estado.:</th>
                   
                    <th>Ver.:</th>
                    
                    
                </tr>
            </thead>
            
            <tbody>
                @foreach($cuotas as $cuota)
                <tr>
                    <td>{{$cuota->loan_id}}</td>
                    <td>{{$cuota->number}}</td>
                    <td>${{number_format($cuota->amount)}}</td>
                    <td>${{number_format($cuota->surcharge)}}</td>
                    <td>${{number_format($cuota->amount + $cuota->surcharge)}}</td>
                    <td>{{$cuota->updated_at->format('d-m-Y h:i:s A')}}</td>
                    <td>{{$cuota->quotastatu->name}}</td>
                    
                    <td>
                        <a href="{{URL::to("admin/loan/$cuota->loan_id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                   
                    
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        {{$cuotas->links()}}
    </div>
</div>

@stop