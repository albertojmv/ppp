@extends('master.layout')

@section('contenido')

<div class="panel panel-green">
    <div class="panel-heading">
        Garantía</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.warrantydetail.store', 'method'=>'POST'])!!}
            <div class="form-body pal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" class="control-label">
                                Artículo</label>
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="name" name="name" type="text" placeholder="Artículo" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputwarrantyt" class="control-label">
                                Tipo de garantía</label>
                             {!! Form::select('warranty_id',$warranty_list,null,array('class'=>'form-control'),['id'=>'warranty_list']) !!}
                        </div>
                    </div>
                </div>
                
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputamount" class="control-label">
                                Precio</label>
                            <div class="input-icon right">
                                <i class="fa fa-money"></i>
                                <input id="price" name="price" type="text" placeholder="Precio" class="form-control" />
                            </div>
                        </div>
                    </div>
                    
                </div>
                  
                <div class="form-group mbn">
                    <textarea name="notes" rows="5" placeholder="Descripción" class="form-control"></textarea>
                </div>
                <input name="loan_id" type="hidden" value="{{$_GET['id']}}">
            </div>
            <div class="form-actions text-right pal">
                <button type="submit" class="btn btn-primary">
                    Crear Garantía</button>
            </div>
        {!!Form::close()!!}
    </div>
</div>


@endsection