@extends('master.layout')

@section('contenido')
@include('alerts.request')
<div class="panel panel-violet">
    <div class="panel-heading">
        Crear Referencia</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'manager.references.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Nombre</label>
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="name" name="name" type="text" placeholder="Nombre" class="form-control" value="{{ old('name') }}" /></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Dirección</label>
                            <div class="input-icon right">
                                <i class="fa fa-map-marker"></i>
                                <input id="address" name="address" type="text" placeholder="Dirección" class="form-control" value="{{ old('address') }}" /></div>
                        </div>
                    </div>
                    
                </div>
                
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputwarrantyt" class="control-label">
                                Provincia</label>
                             {!! Form::select('province_id',$provinces_list,null,array('class'=>'form-control'),['id'=>'provinces_list']) !!}
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputwarrantyt" class="control-label">
                                Tipo de referencia</label>
                             {!! Form::select('references_types_id',$references_list,null,array('class'=>'form-control'),['id'=>'references_list']) !!}
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Teléfono</label>
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="phone" name="phone" type="text" placeholder="Teléfono" class="form-control" data-mask="999-999-9999" value="{{ old('phone') }}" /></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Dónde trabaja</label>
                            <div class="input-icon right">
                                <i class="fa fa-bank"></i>
                                <input id="work" name="work" type="text" placeholder="Dónde trabaja" class="form-control" value="{{ old('work') }}" /></div>
                        </div>
                    </div>
                    
                </div>
               
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Teléfono trabajo</label>
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="workphone" name="workphone" type="text" placeholder="Teléfono trabajo" class="form-control" data-mask="999-999-9999" value="{{ old('workphone') }}" /></div>
                        </div>
                    
                  
                
                <input name="customer_id" type="hidden" value="{{$_GET['id']}}">
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Crear Referencia</button>
            </div>
        {!!Form::close()!!}
    </div>
</div>


@endsection