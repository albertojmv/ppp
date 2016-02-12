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
                                <input id="inputCedula" name="cedula" type="text" placeholder="Cedula" class="form-control" data-mask="999-9999999-9" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputPhone" type="text" placeholder="Phone" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-envelope"></i>
                                <input id="inputEmail" type="text" placeholder="E-mail" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-phone"></i>
                                <input id="inputPhone" type="text" placeholder="Phone" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option>Interested in</option>
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
                                <option>Budget</option>
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
                                <i class="fa fa-calendar"></i>
                                <input id="inputStartDate" type="text" placeholder="Expected start date" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="inputFinishDate" type="text" placeholder="Expected finish date" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input id="inputIncludeFile" type="file" placeholder="Inlcude some file" /></div>
                <div class="form-group mbn">
                    <textarea rows="5" placeholder="Tell us about your project" class="form-control"></textarea></div>
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Send request</button>
            </div>
        </form>
    </div>
</div>




@stop