<div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                        
                                        <h3>Datos de usuario</h3>

                                            <div class="form-group"><label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="email" name="email" placeholder="email@yourcompany.com" class="form-control" value="{{$user->email}}"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Nombre de usuario</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="username" placeholder="Nombre de usuario" class="form-control" pattern="[a-z0-9]+" value="{{$user->username}}"/></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Contraseña</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">{!!Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña'])!!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr/>
                                            <h3>Datos personales</h3>

                                            <div class="form-group"><label class="col-sm-3 control-label">Nombre</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre'])!!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-3 control-label">Apellidos</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">{!!Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Apellidos'])!!}</div>
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
                                            <div class="form-group"><label class="col-sm-3 control-label">Estado</label>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            {!! Form::select('state_id',$states_list,null,array('class'=>'form-control'),['id'=>'states_list']) !!}
                                                           
                                                        </div>
                                                    </div>
                                                </div>                                                          
                                            </div>
                                            <hr/>
                                            
                                            
                                           
                                    </div>
                                    
                                </div>




