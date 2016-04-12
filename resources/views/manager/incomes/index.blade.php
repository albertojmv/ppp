@extends('master.layout')
@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="panel panel-violet">
    <div class="panel-heading">Información laboral o de ingresos</div>
    <div class="panel-body">

        <a href="{{URL::to("manager/incomes/create?id=".$_GET['search'])}}" class="btn btn-green"><img src="/images/editar.png">Agregar</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de empresa.:</th>
                    <th>Cargo.:</th>
                    <th>Ingreso.:</th>
                    <th>Tipo de empresa.:</th>
                  
                   
                    <th>Editar.:</th>
                    <th>Eliminar .:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($incomes as $income)
                <tr>
                    <td>{{$income->id}}</td>
                    <td>{{$income->name}}</td>
                    <td>{{$income->position}}</td>
                    <td>{{$income->amount}}</td>
                    <td>{{$income->typeofcompany->name}}</td>

                   
                    
                    <td>
                        <a href="{{URL::to("manager/incomes/$income->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                    </td>
                    <td>
                        {!!Form::open(['route'=>['manager.incomes.destroy',$income->id ], 'method'=>'DELETE'])!!}
                       
                        <input type="image" name="imageField" src="/images/borrar.png" class="btn btn-danger" onclick="return confirm('¿Seguro quieres eliminar este ingreso?')" />
                        {!!Form::close()!!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$incomes->links()}}
    </div>
</div>

@stop