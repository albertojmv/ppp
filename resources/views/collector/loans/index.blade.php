@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-green">
    <div class="panel-heading">Préstamos</div>
    <div class="panel-body">
        {!!Form::open(['route'=>'collector.loans.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}

        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    @if(count($loans) == 0)
                    <th><strong>No existen resultados</strong></th>
                    @else
                    <th>#</th>
                    <th>Cliente.:</th>
                    <th>Monto.:</th>
                    <th># Cuotas.:</th>
                    <th>Creado por.:</th>
                    <th>Estado.:</th>
                    <th>Pagar.:</th>
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
                    <td>{{$loan->user->name}}</td>
                    <td>{{$loan->loanstatu->name}}</td>
                    <td>
                        {!!Form::open(['route'=>'collector.payments.create', 'method'=>'GET'])!!}
                        <input name="id" type="hidden" value="{{$loan->id}}">
                        <input type="image" name="imageField" src="/images/pay.png" class="btn btn-yellow" />
                        {!!Form::close()!!}

                    </td>
                    <td>
                        <a href="{{URL::to("collector/loan/$loan->id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
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