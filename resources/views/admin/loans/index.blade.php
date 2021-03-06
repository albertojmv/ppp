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
        {!!Form::open(['route'=>'admin.loans.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}

        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}
        <a href="{{URL::to("admin/loans/create?id=")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
        <a href="{{URL::to("admin/calc")}}" class="btn btn-blue"><img src="/images/calc.png">Calculadora de Préstamos</a>
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
                    <th>Garantía.:</th>
                    <th>Editar.:</th>
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
                    @if($loan->loanstatu->id == 1)
                    <td><span class="label label-sm label-blue">{{$loan->loanstatu->name}}</span></td>
                    @else
                    <td><span class="label label-sm label-success">{{$loan->loanstatu->name}}</span></td>
                    @endif
                    <td>
                        {!!Form::open(['route'=>'admin.payments.create', 'method'=>'GET'])!!}
                        <input name="id" type="hidden" value="{{$loan->id}}">
                        <input type="image" name="imageField" src="/images/pay.png" class="btn btn-yellow" />
                        {!!Form::close()!!}

                    </td>
                    <td>
                        <a href="{{URL::to("admin/loan/$loan->id")}}" class="btn btn-dark"><img src="/images/view.png"></a>
                    </td>
                    <td>
                        {!!Form::open(['route'=>'admin.warrantydetail.index', 'method'=>'GET'])!!}
                        <input name="search" type="hidden" value="{{$loan->id}}">
                        <input type="image" name="imageField" src="/images/warranty.png" class="btn btn-green" />
                        {!!Form::close()!!}

                    </td>
                    <td>
                        <a href="{{URL::to("admin/loans/$loan->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
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