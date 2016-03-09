@extends('master.layout')

@section('contenido')

@include('alerts.request')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<script>
    function validate() {
        var result = confirm("¿Estás seguro que quieres realizar este pago?");
        return result;
    }
</script>

<div class="panel panel-yellow">
    <div class="panel-heading">Realizar pago.:</div>


    <div class="panel-body pan">

        {!!Form::open(['route'=>'admin.payments.store', 'method'=>'POST'])!!}
        <div class="form-body pal">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pay" class="control-label">
                        Monto a pagar.:</label>

                    <div class="input-icon right">
                        <i class="fa fa-money"></i>
                        <input id="pay" name="pay" type="text" placeholder="" class="form-control" value="{{($cuota->amount + $cuota->surcharge)-$pagos->total_amount}}" /></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="formofpayment_id" class="control-label">
                        Forma de Pago.:</label>
                    {!! Form::select('formofpayment_id',$formofpayment_list,null,array('class'=>'form-control'),['id'=>'formofpayment_list']) !!}
                </div>
            </div>

            <div class="col-sm-9 controls">
                <div class="form-group">
                    <label for="notes" class="control-label">
                        Notas.:</label>
                    <div class="input-icon right">
                        <i class="fa fa-pencil"></i>
                        <input id="notes" name="notes" type="text" placeholder="Notas" class="form-control" value="Pagado por: {{$prestamo->customer->name}} {{$prestamo->customer->lastname}}" /></div>
                </div>
            </div>

            <input name="quota_id" type="hidden" value="{{$cuota->id}}" />
            <input name="total" type="hidden" value="{{($cuota->amount + $cuota->surcharge)-$pagos->total_amount}}" />
        </div></div>
    <div class="form-actions text-right pal">
        <button type="submit" class="btn btn-primary" onclick="return validate();">
            Pagar</button>
    </div>
    {!!Form::close()!!}




    <div class="panel-body">
        <h3>Próxima cuota a pagar.:</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Monto</th>
                    <th>Mora</th>
                    <th>Total</th>
                    <th>Pagado</th>
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
                    <td>${{number_format($pagos->total_amount)}}</td>
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