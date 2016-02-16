@extends('master.layout')

@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">
        Préstamo</div>
    <div class="panel-body pan">
        <form action="#">
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                Código de cliente</label>
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" placeholder="Código de cliente" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">
                                E-mail</label>
                            <div class="input-icon right">
                                <i class="fa fa-envelope"></i>
                                <input id="inputEmail" type="text" placeholder="" class="form-control" /></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSubject" class="control-label">
                        Subject</label>
                    <div class="input-icon right">
                        <i class="fa fa-tag"></i>
                        <input id="inputSubject" type="text" placeholder="" class="form-control" /></div>
                </div>
                <div class="form-group">
                    <label for="inputMessage" class="control-label">
                        Message</label><textarea rows="5" class="form-control"></textarea></div>
               
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Send message</button>
            </div>
        </form>
    </div>
</div>


@stop