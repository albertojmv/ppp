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
                                <input id="inputCustomer_id" name="customer_id" type="text" placeholder="Código de cliente" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">
                                Tipo de garantía</label>
                            <select class="form-control">
                                <option>Vehículo</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                            </select></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">
                                Forma de Pago</label>
                            <select class="form-control">
                                <option>Mensual</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                            </select></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">
                                Día de Pago</label>
                            <select class="form-control">
                                <option>30</option>
                                <option value="0">29</option>
                                <option value="1">28</option>
                                <option value="2">27</option>
                            </select></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                % de interés</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="inputCustomer_id" name="customer_id" type="text" placeholder="% de interés" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                % de Mora</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="inputCustomer_id" name="customer_id" type="text" placeholder="% de Mora" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                Monto</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="inputCustomer_id" name="customer_id" type="text" placeholder="Monto" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                # Cuotas</label>
                            <div class="input-icon right">
                                <i class="fa fa-file"></i>
                                <input id="inputCustomer_id" name="customer_id" type="text" placeholder="# Cuotas" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">
                                Tipo de Calculo</label>
                            <select class="form-control">
                                <option>Interés Fijo</option>
                                <option value="0">Saldo Insolutos</option>
                                <option value="1">Saldos solutos</option>
                                <option value="2">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputCustomer_id" class="control-label">
                                Fecha de Entrega</label>
                            <div class="input-icon right">
                                <i class="fa fa-calendar"></i>
                                <input id="inputBirthdate" type="text" name="birthdate" placeholder="Fecha de Entrega" class="form-control" data-mask="9999/99/99" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mbn">
                    <textarea name="notes" rows="5" placeholder="Observaciones" class="form-control"></textarea>
                </div>

            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Crear Préstamo</button>
            </div>
        </form>
    </div>
</div>


@stop