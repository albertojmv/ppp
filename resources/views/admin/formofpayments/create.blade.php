@extends('master.layout')

@section('contenido')
@include('alerts.request')
<div class="panel panel-grey">
    <div class="panel-heading">
        Agregar forma de pago</div>
    <div class="panel-body pan">
        <div class="form-body pal">


            {!!Form::open(['route'=>'admin.formofpayments.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Nombre:</label>
                            <div class="input-icon right">
                                <i class="fa fa-map-marker"></i>
                                <input id="name" name="name" type="text" placeholder="Nombre" class="form-control" value="{{ old('name') }}" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro quieres crear esta forma de pago?')">
                    Crear forma de pago</button>
            </div>
            {!!Form::close()!!}




        </div>
    </div>
</div>

@stop