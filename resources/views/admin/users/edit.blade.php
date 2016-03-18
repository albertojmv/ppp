@extends('master.layout')

@section('contenido')
@include('alerts.request')
{!!Form::model($user,['route'=>['admin.users.update',$user],'method'=>'PUT'])!!}
@include('admin.users.form')

{!!Form::close()!!}
@endsection