@extends('master.layout')

@section('contenido')

<div class="panel panel-yellow">
    <div class="panel-heading">Realizar pago.:</div>
    
    
    <div class="panel-body pan">
       {!!Form::open(['route'=>'admin.payments.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="form-group">
                    <label for="pay" class="col-md-1 control-label">
                        Monto a pagar.:</label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-money"></i>
                            <input id="pay" name="pay" type="text" placeholder="" class="form-control" value="{{number_format($cuota->amount + $cuota->surcharge)}}" /></div>
                    </div>
                </div>


            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Pagar</button>
            </div>
        {!!Form::close()!!}
    </div>
    
    
    
    <div class="panel-body">
        <h3>Próxima cuota a pagar.:</h3>
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
                    <td>{{$cuota->number}}</td>
                    <td>${{number_format($cuota->amount)}}</td>
                    <td>${{number_format($cuota->surcharge)}}</td>
                    <td>${{number_format($cuota->amount + $cuota->surcharge)}}</td>
                    <td>ToDo</td>
                    <td>{{$cuota->getFecha()}}</td>
                    <td>${{number_format($cuota->capital)}}</td>
                    <td>${{number_format($cuota->interest)}}</td>
                    <td><span class="label label-sm label-blue">{{$cuota->quotastatu->name}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    
    
    <div class="panel-body">
        <h3>Detalles del préstamo.</h3>
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
                    <td><span class="label label-sm label-success">{{$prestamo->loanstatu->name}}</span></td>
                </tr>
            </tbody>
        </table>
    </div>



  
</div>



@endsection