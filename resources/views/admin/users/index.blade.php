@extends('master.layout')

@section('contenido')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        Usuarios</div>
    <div class="panel-body pan">
        {!!Form::open(['route'=>'admin.users.index', 'method'=>'GET','class'=>'navbar-form navbar-left pull-right'])!!}
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!!Form::close()!!}

        <div class="form-body pal">






            <a href="{{URL::to("admin/users/create")}}" class="btn btn-green"><img src="/images/editar.png">Agregar Nuevo</a>
            <table class="table">
                <thead>
                    <tr>
                        @if(count($users) == 0)
                    <th><strong>No existen resultados</strong></th>
                    @else
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

                        @if($user->state->id == 1)
                        <td><span class="label label-sm label-success">{{$user->state->name}}</span></td>
                        @else
                        <td><span class="label label-sm label-red">{{$user->state->name}}</span></td>
                        @endif

                        <td>
                            {{$user->created_at->format('d-m-Y h:i:s A')}} 
                        </td>					
                        <td>
                            <a href="{{URL::to("admin/users/$user->id/edit")}}" class="btn btn-success"><img src="/images/editar.png"></a>
                        </td>

                    </tr>

                    @endforeach


                </tbody>
                @endif
            </table>
            {{$users->links()}}




        </div>
    </div>
</div>

@stop