@extends('master.layout')

@section('contenido')
<center><h2>Solicitud de préstamo</h2></center>
<table class="table table-hover table-striped">
  <tbody>
    <tr>
      <td><b>Nombres:</b> {{$application->name}}</td>
      <td><b>Apellidos:</b> {{$application->lastname}}</td>
    </tr>
    <tr>
        <td><b>Cedula:</b> {{$application->cedula}}</td>
      <td><b>Correo:</b> {{$application->email}}</td>
    </tr>
    <tr>
      <td><b>Teléfono:</b> {{$application->phone}}</td>
      <td><b>Celular:</b> {{$application->cellphone}}</td>
    </tr>
    <tr>
      <td><b>Monto que Solicita:</b> {{$application->amount}}</td>
      <td><b>Plazo:</b> {{$application->quotas}}</td>
    </tr>
    <tr>
      <td><b>Lugar de Trabajo:</b> {{$application->workplace}}</td>
      <td><b>Tiempo Laborando:</b> {{$application->timeworked}}</td>
    </tr>
    <tr>
      <td><b>Ingresos:</b> {{$application->salary}}</td>
      <td><b>Ingresos Adicionales:</b> {{$application->additional_income}}</td>
    </tr>
    <tr>
      <td><b>Concepto Ingresos Adicionales:</b> {{$application->concept_income}}</td>
      <td><b>Posee Vehículo:</b> {{$application->getVehiculo()}}</td>
    </tr>
    <tr>
      <td><b>Marca:</b> {{$application->brand}}</td>
      <td><b>Modelo:</b> {{$application->model}}</td>
    </tr>
    <tr>
      <td><b>Año:</b> {{$application->year}}</td>
      <td><b>Vivienda:</b> {{$application->getVivienda()}}</td>
    </tr>
    <tr>
      <td><b>Tiempo viviendo residencia:</b> {{$application->time_living}}</td>
      <td><b>Estado Civil:</b> {{$application->civilstatu->name}}</td>
    </tr>
  </tbody>
</table>

@stop