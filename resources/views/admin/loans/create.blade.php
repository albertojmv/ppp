@extends('master.layout')

@section('contenido')
@include('alerts.request')
<div class="panel panel-green">
    <div class="panel-heading">
        Préstamo</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.loans.store', 'method'=>'POST'])!!}
        
        <div class="form-body pal">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_id" class="control-label">
                            Código de cliente</label>
                        <div class="input-icon right">
                            <i class="fa fa-user"></i>
                            <input id="customer_id" name="customer_id" type="text" placeholder="Código de cliente" class="form-control" value="{{$_GET['id']}}" /></div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paymentmethod" class="control-label">
                            Forma de Pago</label>
                        {!! Form::select('paymentmethod_id',$paymentmethod_list,null,array('class'=>'form-control'),['id'=>'paymentmethod_list']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputpayday" class="control-label">
                            Días de gracia(Mora)</label>
                        <div class="input-icon right">
                            <i class="fa fa-calendar-o"></i>
                            <input id="inputpayday" name="payday" type="text" placeholder="Días de gracia" class="form-control" data-mask="99" value="{{ old('payday') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputinterest" class="control-label">
                            % de interés</label>
                        <div class="input-icon right">
                            <i class="fa fa-money"></i>
                            <input id="inputinterest" name="interest" type="text" placeholder="% de interés" class="form-control" value="{{ old('interest') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputsurcharge" class="control-label">
                            % de mora</label>
                        <div class="input-icon right">
                            <i class="fa fa-money"></i>
                            <input id="inputsurcharge" name="surcharge" type="text" placeholder="% de mora" class="form-control" value="{{ old('surcharge') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputamount" class="control-label">
                            Monto</label>
                        <div class="input-icon right">
                            <i class="fa fa-money"></i>
                            <input id="inputamount" name="amount" type="text" placeholder="Monto" class="form-control" value="{{ old('amount') }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputquotas" class="control-label">
                            # Cuotas</label>
                        <div class="input-icon right">
                            <i class="fa fa-file"></i>
                            <input id="inputquotas" name="quotas" type="text" placeholder="# Cuotas" class="form-control" value="{{ old('quotas') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputcalculationtype_id" class="control-label">
                            Tipo de Calculo</label>
                        {!! Form::select('calculationtype_id',$calculationtype_list,null,array('class'=>'form-control'),['id'=>'calculationtype_list']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputdelivery" class="control-label">
                            Fecha de Entrega</label>
                        <div class="input-icon right">
                            <i class="fa fa-calendar"></i>
                            <input id="inputDate" type="text" name="delivery" placeholder="Fecha de Entrega" class="form-control" data-mask="99-99-9999" value="{{ old('delivery') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mbn">
                <textarea name="notes" rows="5" placeholder="Observaciones" class="form-control">{{ old('notes') }}</textarea>
            </div>

        </div>
        <div class="form-actions text-right pal">
            <button type="submit" class="btn btn-primary">
                Crear Préstamo</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>


@endsection