@extends('..master.layout')

@section('contenido')


<div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                        <form action="{{URL::route('admin.users.store')}}" class="form-horizontal" method="post"><h3>Datos de usuario</h3>

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
                                                        <div class="col-xs-4"><select class="form-control">
                                                            <option>Administrador</option>
                                                            <option>Gestor</option>
                                                            <option>Cobrador</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr/>
                                            
                                            
                                            <button type="submit" class="btn btn-green btn-block">Enviar</button>
                                        </form>
                                    </div>
                                    
                                </div>



@stop