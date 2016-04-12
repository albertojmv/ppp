@extends('master.layout')
@section('contenido')
@include('alerts.request')
<div class="panel panel-green">
    <div class="panel-heading">
        Préstamos Saldados</div>
    <div class="panel-body pan">
        <div class="form-body pal">


            {!!Form::open(['route'=>'manager.reportsloanssold.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from" class="control-label">
                                Desde:</label>
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="from" name="from" type="text" placeholder="Desde" class="form-control" data-mask="99-99-9999" value="{{ old('from') }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="until" class="control-label">
                                Hasta:</label>
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="until" name="until" type="text" placeholder="Hasta" class="form-control" data-mask="99-99-9999" value="{{ old('until') }}" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro quieres crear este reporte?')">
                    Crear Reporte</button>
            </div>
            {!!Form::close()!!}




        </div>
    </div>
</div>

@stop