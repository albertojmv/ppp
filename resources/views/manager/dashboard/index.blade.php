@extends('master.layout')

@section('contenido')

<h4><i class="icheckbox_flat-orange"></i>Panel de control</h4>
<div class="page-content">
    <div id="tab-general">

        <div class="row mbl">



            <div class="col-lg-4">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            Notificaciones</div>
                    </div>
                    <div class="portlet-body">
                        <div class="chat-scroller">
                            <ul class="chats">
                                @foreach($notifications as $notification)
                                <li class="in">
                                    <img src="/images/avatar/sound.png" class="avatar img-responsive" />
                                    <div class="message">
                                        <span class="chat-arrow"></span>&nbsp;<span
                                            class="chat-datetime">{{$notification->created_at->format('d-m-Y h:i:s A')}}</span><span class="chat-body">
                                            {{$notification->message}}
                                        </span></div>
                                </li>
                                @endforeach


                                
                            </ul>
                            {{$notifications->links()}}
                        </div>

                    </div>
                </div>
            </div>





            <div class="col-lg-8">
                <div class="portlet box">
                    <div class="portlet-header">
                        <div class="caption">
                            Últimas cuotas con mora</div>
                    </div>
                    <div style="overflow: hidden;" class="portlet-body">
                        <ul class="todo-list sortable">
                            @foreach($surcharges as $surcharge)

                            <li class="clearfix"><span class="drag-drop"><i></i></span>
                                <div class="todo-check pull-left">
                                    Prestamo #{{$surcharge->loan_id}}
                                </div>
                                <div class="todo-title">
                                    Cuota #{{$surcharge->number}}   Fecha: {{$surcharge->created_at->format('d-m-Y')}}
                                </div>
                                <div class="todo-actions pull-right clearfix">
                                    <a href="{{URL::to("admin/loan/$surcharge->loan_id")}}" class="todo-complete"><i class="fa fa-info-circle"></i></a>
                                </div>
                            </li>

                            @endforeach


                        </ul>
                        {{$surcharges->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop