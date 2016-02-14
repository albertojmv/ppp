@extends('master.layout')

@section('contenido')

<div class="panel panel-violet">
    <div class="panel-heading">
        Datos del Cliente</div>
    <div class="panel-body pan">
        <form action="#">
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" name="name" type="text" placeholder="Nombres" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputlastname" type="text" name="lastname" placeholder="Apellidos" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-credit-card"></i>
                                <input id="inputCedula" name="cedula" type="text" placeholder="Cédula" class="form-control" data-mask="999-9999999-9" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-book"></i>
                                <input id="inputPassport" type="text" name="passport" placeholder="Pasaporte" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputPhone" type="text" name="phone" placeholder="Teléfono" class="form-control" data-mask="999-999-9999" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputCellphone" type="text" name="cellphone" placeholder="Celular" class="form-control" data-mask="999-999-9999" /></div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Nacionalidad</option>
                                <option value="design">Design</option>
                                <option value="development">Development</option>
                                <option value="illustration">Illustration</option>
                                <option value="brading">Branding</option>
                                <option value="video">Video</option>
                            </select></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Ciudad</option>
                                <option value="0">Less than 5000$</option>
                                <option value="1">5000$ - 10000$</option>
                                <option value="2">10000$ - 20000$</option>
                                <option value="3">More than 20000$</option>
                            </select></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-map-marker"></i>
                                <input id="inputAddress" type="text" name="address" placeholder="Dirección" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-envelope"></i>
                                <input id="inputEmail" type="text" name="email" placeholder="Correo electrónico" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Estado civil</option>
                                <option value="design">Design</option>
                                <option value="development">Development</option>
                                <option value="illustration">Illustration</option>
                                <option value="brading">Branding</option>
                                <option value="video">Video</option>
                            </select></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Sexo</option>
                                <option value="0">Less than 5000$</option>
                                <option value="1">5000$ - 10000$</option>
                                <option value="2">10000$ - 20000$</option>
                                <option value="3">More than 20000$</option>
                            </select></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-briefcase"></i>
                                <input id="inputProfession" type="text" name="profession" placeholder="Ocupación" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="inputBirthdate" type="text" name="birthdate" placeholder="Fecha de nacimiento" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mbn">
                    <textarea rows="5" placeholder="Notas sobre el cliente" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Guardar</button>
            </div>
        </form>
    </div>
</div>




@stop