@extends('master.layout')

@section('contenido')
@include('alerts.request')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-yellow">
    <div class="panel-heading">
        Pagos</div>
    <div class="panel-body pan">
       {!!Form::open(['route'=>'manager.payments.store', 'method'=>'POST'])!!}
           <input name="action" type="hidden" value="1" />
       <div class="form-body pal">
                <div class="form-group">
                    <label for="loan" class="col-md-3 control-label">
                        Número de préstamo:</label>
                    <div class="col-md-9">
                        <div class="input-icon right">
                            <i class="fa fa-file"></i>
                            <input id="loan" name="loan" type="text" placeholder="" class="form-control" value="{{$_GET['id']}}"/></div>
                    </div>
                </div>


            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Continuar</button>
            </div>
        {!!Form::close()!!}
    </div>
</div>




@endsection