@extends('master.layout')
@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">Préstamos Saldados</div>
    <div class="panel-body">
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    @if(count($loans) == 0)
                    <th><strong>No existen resultados</strong></th>
                    @else
                    <th># Prestamo</th>
                    <th>Cliente.:</th>
                    <th>Monto.:</th>
                    <th># Cuotas.:</th>
                    <th>Creado por.:</th>
                    <th>Fecha de saldo.:</th>
                    <th>Estado.:</th>
                   
                    <th>Ver.:</th>
                    
                    
                </tr>
            </thead>
            
            <tbody>
                @foreach($loans as $loan)
                <tr>
                    <td>{{$loan->id}}</td>
                    <td>{{$loan->customer->name}} {{$loan->customer->lastname}}</td>
                    <td>${{number_format($loan->amount)}}</td>
                    <td>{{$loan->quotas}}</td>
                    <td>{{$loan->user->username}}</td>
                    <td>{{$loan->updated_at->format('d-m-Y h:i:s A')}}</td>
                    <td>{{$loan->loanstatu->name}}</td>
                    
                    <td>
                        <a href="{{URL::to("manager/loan/$loan->id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                   
                    
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        {{$loans->links()}}
    </div>
</div>

@stop