@extends('master.layout')

@section('contenido')
@include('alerts.request')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-green">
    <div class="panel-heading">Agregar fotos.</div>
    <div class="panel-body">
        {!!Form::open(['route'=>'admin.warranties.store', 'method'=>'POST', 'files'=>'true'])!!}
        
        <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputamount" class="control-label">
                                Descripción:</label>
                            <div class="input-icon right">
                                <i class="fa fa-text-width"></i>
                                <input id="inputamount" name="description" type="text" placeholder="Descripción" class="form-control" />
                            </div>
                        </div>
                    </div>
        
        
        
        
        <div class='form-group'>

            <label for='image'>Imagen: </label>

            <input type="file" name="image" />

        </div>
        <input name="loan_id" type="hidden" value="{{$_GET['id']}}">

<button type='submit' class='btn btn-primary'>Guardar imagen</button>
        {!!Form::close()!!}

    </div>

</div>




@endsection