@extends('master.layout')

@section('contenido')
@include('alerts.request')

<div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                        {!!Form::open(['route'=>'admin.users.store', 'method'=>'POST'])!!}
                                        <h3>Datos de usuario</h3>

                                            <div class="form-group"><label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="email" name="email" placeholder="email@yourcompany.com" class="form-control"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nombre de usuario</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="username" placeholder="Nombre de usuario" class="form-control"/></div>
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
                                                        <div class="col-xs-4"><input type="password" placeholder="Contraseña" class="form-control"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <h3>Datos personales</h3>

                                            <div class="form-group"><label class="col-sm-3 control-label">Nombre</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="name" placeholder="Nombre" class="form-control"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Apellidos</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="lastname" placeholder="Apellidos" class="form-control"/></div>
                                                    </div>
                                                </div>
                                            </div>
                 
                                            
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
                                            
                                            {!!Form::submit('Registrar',['class'=>'btn btn-green btn-block'])!!}
                                            
                                        {!!Form::close()!!}
                                    </div>
                                    
                                </div>




@endsection