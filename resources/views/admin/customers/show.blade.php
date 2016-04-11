@extends('master.layout')
@section('contenido')


<center><h2>Datos del cliente</h2></center>
<table class="table table-hover table-striped">
    <tbody>
        <tr>
            <td><b>Nombre:</b> {{$customer->name}}</td>
            <td><b>Apellidos:</b> {{$customer->lastname}}</td>
        </tr>
        <tr>
            <td><b>Cedula:</b> {{$customer->cedula}}</td>
            <td><b>Pasaporte:</b> {{$customer->amount}}</td>
        </tr>
        <tr>
            <td><b>Teléfono:</b> {{$customer->phone}}</td>
            <td><b>Celular:</b> {{$customer->cellphone}}</td>
        </tr>
        <tr>
            <td><b>Nacionalidad:</b> {{$customer->country->name_es}}</td>  
            <td><b>Ciudad:</b> {{$customer->province->name}}</td>
        </tr>
        <tr>
            <td><b>Dirección:</b> {{$customer->address}}</td>
            <td><b>Correo:</b> {{$customer->email}}</td>
        </tr>
        <tr>
            <td><b>Estado civil:</b> {{$customer->civilstatu->name}}</td>
            <td><b>Sexo:</b> {{$customer->gender->name}}</td>
        </tr>
        <tr>
            <td><b>Ocupación:</b> {{$customer->profession}}</td>
            <td><b>Fecha de nacimiento:</b> {{$customer->getFecha()}}</td>
        </tr>
    </tbody>
</table>
<center><h2>Referencias</h2></center>


<table class="table table-hover table-striped">
    <thead>
        <tr>
            @if(count($references) == 0)
            <th><strong>Este cliente no tiene ninguna referencia creada.</strong></th>
            @else
            <th>Nombre.:</th>
            <th>Dirección.:</th>
            <th>Provincia.:</th>
            <th>Tipo de referencia.:</th>
            <th>Teléfono.:</th>
            <th>Dónde trabaja.:</th>
            <th>Teléfono trabajo.:</th>
        </tr>
    </thead>

    <tbody>
        @foreach($references as $reference)
        <tr>
            <td>{{$reference->name}}</td>
            <td>{{$reference->address}}</td>
            <td>{{$reference->province->name}}</td>
            <td>{{$reference->references_type->name}}</td>
            <td>{{$reference->phone}}</td>
            <td>{{$reference->work}}</td>
            <td>{{$reference->workphone}}</td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
<center><h2>Información laboral o de ingresos</h2></center>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            @if(count($incomes) == 0)
            <th><strong>Este cliente no tiene ninguna información laboral o de ingresos creada.</strong></th>
            @else
            <th>Nombre de empresa.:</th>
            <th>Cargo.:</th>
            <th>Ingreso.:</th>
            <th>Tipo de empresa.:</th>
          
        </tr>
    </thead>

    <tbody>
        @foreach($incomes as $income)
        <tr>
            <td>{{$income->name}}</td>
            <td>{{$income->position}}</td>
            <td>{{$income->amount}}</td>
            <td>{{$income->typeofcompany->name}}</td>
           
        </tr>
        @endforeach
    </tbody>
    @endif
</table>


@stop




