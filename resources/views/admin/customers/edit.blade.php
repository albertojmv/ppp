@extends('master.layout')

@section('contenido')
@include('alerts.request')
<div class="panel panel-violet">
    <div class="panel-heading">
        Datos del Cliente</div>
    <div class="panel-body pan">
        {!!Form::model($customer,['route'=>['admin.customers.update',$customer],'method'=>'PUT'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="name" type="text" placeholder="Nombres" class="form-control" value="{{ $customer->name }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputlastname" type="text" name="lastname" placeholder="Apellidos" class="form-control" value="{{ $customer->lastname }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-credit-card"></i>
                                <input id="inputCedula" name="cedula" type="text" placeholder="Cédula" class="form-control" data-mask="999-9999999-9" value="{{ $customer->cedula }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-book"></i>
                                <input id="inputPassport" type="text" name="passport" placeholder="Pasaporte" class="form-control" value="{{ $customer->passport }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputPhone" type="text" name="phone" placeholder="Teléfono" class="form-control" data-mask="999-999-9999" value="{{ $customer->phone }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputCellphone" type="text" name="cellphone" placeholder="Celular" class="form-control" data-mask="999-999-9999" value="{{ $customer->cellphone }}" /></div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <label for="country_id" class="control-label">
                                Nacionalidad</label>
                        <div class="form-group">
                           {!! Form::select('country_id',$countries_list,null,array('class'=>'form-control'),['id'=>'countries_list']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="province_id" class="control-label">
                                Ciudad</label>
                        <div class="form-group">
                            {!! Form::select('province_id',$provinces_list,null,array('class'=>'form-control'),['id'=>'provinces_list']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-map-marker"></i>
                                <input id="inputAddress" type="text" name="address" placeholder="Dirección" class="form-control" value="{{ $customer->address }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-envelope"></i>
                                <input id="inputEmail" type="text" name="email" placeholder="Correo electrónico" class="form-control" value="{{ $customer->email }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="civilstatu_id" class="control-label">
                                Estado civil</label>
                        <div class="form-group">
                            {!! Form::select('civilstatu_id',$civilstatus_list,null,array('class'=>'form-control'),['id'=>'civilstatus_list']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gender_id" class="control-label">
                                Sexo</label>
                        <div class="form-group">
                            {!! Form::select('gender_id',$genders_list,null,array('class'=>'form-control'),['id'=>'genders_list']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-briefcase"></i>
                                <input id="inputProfession" type="text" name="profession" placeholder="Ocupación" class="form-control" value="{{ $customer->profession }}" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="inputBirthdate" type="text" name="birthdate" placeholder="Fecha de nacimiento" class="form-control" data-mask="99-99-9999" value="{{ $customer->getFecha() }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mbn">
                    <textarea name="notes" rows="5" placeholder="Notas sobre el cliente" class="form-control">{{ $customer->notes }}</textarea>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Guardar</button>
            </div>
        {!!Form::close()!!}
    </div>
</div>



@endsection