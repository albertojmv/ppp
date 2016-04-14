@extends('master.layout')
@section('contenido')
@include('alerts.request')
<div class="panel panel-green">
    <div class="panel-heading">
        Calculadora de Préstamos</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'manager.calc.store', 'method'=>'POST'])!!}
        
        <div class="form-body pal">
           
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
                        <label for="inputinterest" class="control-label">
                            % de interés</label>
                        <div class="input-icon right">
                            <i class="fa fa-money"></i>
                            <input id="inputinterest" name="interest" type="text" placeholder="% de interés" class="form-control" value="{{ old('interest') }}"/>
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
                            Fecha de inicio</label>
                        <div class="input-icon right">
                            <i class="fa fa-calendar"></i>
                            <input id="inputDate" type="text" name="delivery" placeholder="Fecha de inicio" class="form-control" data-mask="99-99-9999" value="{{ old('delivery') }}"/>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        <div class="form-actions text-right pal">
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro quieres Calcular este préstamo?')">
                Calcular</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>


@endsection