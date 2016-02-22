@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h1>Usuarios</h1>
            <a href="{{URL::to("admin/users/create")}}" class="btn btn-danger"><img src="/images/editar.png">Agregar Nuevo</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nombre.:
                        </th>
                        <th>
                            Nombre de usuario.:
                        </th>
                        <th>
                            E-mail.:
                        </th>

                        <th>
                            Rol.:
                        </th> 
                        <th>
                            Estado.:
                        </th>   

                        <th>
                            Creado en.:
                        </th>
                        <th>
                            Editar
                        </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)   
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->name}} {{$user->lastname}} 
                        </td>
                        <td>
                            {{$user->username}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>

                        <td>

                            {{$user->role->name}}

                        </td>
                        <td>

                            <span class="label label-sm label-success">{{$user->state->name}}</span>

                        </td>

                        <td>
                            {{$user->created_at->format('d-m-Y h:i:s A')}} 
                        </td>					
                        <td>
                            <a href="{{URL::to("admin/users/$user->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                        </td>

                    </tr>

                    @endforeach


                </tbody>

            </table>
            {{$users->links()}}
        </div>
    </div>
</div>


@stop