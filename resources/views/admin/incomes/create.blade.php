@extends('master.layout')
@section('contenido')
@include('alerts.request')
<div class="panel panel-violet">
    <div class="panel-heading">
        Información laboral o de ingresos</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.incomes.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="control-label">
                                Nombre de empresa</label>
                            <div class="input-icon right">
                                <i class="fa fa-building"></i>
                                <input id="name" name="name" type="text" placeholder="Nombre de empresa" class="form-control" value="{{ old('name') }}" /></div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="position" class="control-label">
                                Cargo</label>
                            <div class="input-icon right">
                                <i class="fa fa-briefcase"></i>
                                <input id="position" name="position" type="text" placeholder="Cargo" class="form-control" value="{{ old('position') }}" /></div>
                        </div>
                    </div>
                    
                </div>
                
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount" class="control-label">
                                Ingreso</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="amount" name="amount" type="text" placeholder="Ingreso" class="form-control" value="{{ old('amount') }}" /></div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputwarrantyt" class="control-label">
                                Tipo de empresa</label>
                             {!! Form::select('typeofcompany_id',$typeofcompany_list,null,array('class'=>'form-control'),['id'=>'typeofcompany_list']) !!}
                        </div>
                    </div>
                    
                </div>
               
               
                        
                    
                  
                
                <input name="customer_id" type="hidden" value="{{$_GET['id']}}">
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Crear ingreso</button>
            </div>
        {!!Form::close()!!}
    </div>
</div>


@endsection