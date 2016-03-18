@extends('master.layout')

@section('contenido')
@include('alerts.request')

<div class="panel panel-default">
    <div class="panel-heading">
        Usuarios del sistema</div>
    <div class="panel-body pan">
        <div class="form-body pal">
        {!!Form::open(['route'=>'admin.users.store', 'method'=>'POST'])!!}
        <h3>Datos de usuario</h3>

        <div class="form-group"><label class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-9"><input type="email" name="email" placeholder="email@yourcompany.com" class="form-control" value="{{ old('email') }}"/></div>
                </div>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-3 control-label">Nombre de usuario</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-9"><input type="text" name="username" placeholder="Nombre de usuario" class="form-control" pattern="[a-z0-9]+" value="{{ old('username') }}"/></div>
                </div>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-3 control-label">Contraseña</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-4"><input type="password" name="password" placeholder="Contraseña" class="form-control"/></div>
                </div>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-3 control-label">Confirmar contraseña</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-4"><input type="password" name="password_confirmation" placeholder="Contraseña" class="form-control"/></div>
                </div>
            </div>
        </div>
        <hr/>
        <h3>Datos personales</h3>

        <div class="form-group"><label class="col-sm-3 control-label">Nombre</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-9"><input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ old('name') }}"/></div>
                </div>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-3 control-label">Apellidos</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-9"><input type="text" name="lastname" placeholder="Apellidos" class="form-control" value="{{ old('lastname') }}"/></div>
                </div>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <div class="form-group"><label class="col-sm-3 control-label">Rol de usuario</label>

            <div class="col-sm-9 controls">
                <div class="row">
                    <div class="col-xs-4">
                        {!! Form::select('role_id',$roles_list,null,array('class'=>'form-control'),['id'=>'roles_list']) !!}

                    </div>
                </div>
            </div>


        </div>

        <hr/>


      <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro quieres crear este usuario?')">
                    Crear usuario</button>
            </div>

        {!!Form::close()!!}
    </div>
</div>
</div>




@endsection