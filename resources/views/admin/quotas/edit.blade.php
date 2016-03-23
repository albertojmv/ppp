@extends('master.layout')

@section('contenido')
@include('alerts.request')
<div class="panel panel-green">
    <div class="panel-heading">
        Editar Mora</div>
    <div class="panel-body pan">
        <div class="form-body pal">

            {!!Form::model($quota,['route'=>['admin.quotas.update',$quota],'method'=>'PUT'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Mora:</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="surcharge" name="surcharge" type="text" placeholder="Mora" class="form-control" value="{{ $quota->surcharge }}" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro quieres editar esta mora?')">
                    Editar Mora</button>
            </div>
            {!!Form::close()!!}




        </div>
    </div>
</div>

@stop