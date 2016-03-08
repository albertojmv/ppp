
@extends('master.invoice')

@section('contenido')




<div class="container">
    <div class="row">
        <div class="col-xs-12 receipt-text">
            <div class="invoice-title">
                <img width="250pt"
                     src="http://corp.ingrammicro.com/getmedia/7f7a07d8-7b66-4e8c-ad29-e9245d393ff0/Ingram_Micro_Wordmark_bw_LoRes.aspx">
                <h4 class="pull-right"><strong>ORDEN DE SERVICIO:</strong> <!--4DTEXT vWEBvar27--></h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <span class="receipt-text_title"><strong>INFORMACION DEL CLIENTE</strong></span><br>
                        <strong>Cedula / NIT:</strong> <!--#4DTEXT vWEBvar4--><br>
                        <strong>Nombre:</strong> <!--4DTEXT vWEBvar5--> <!--4DTEXT vWEBvar25--><br>
                        <strong>Dirección 1:</strong> <!--#4DTEXT vWEBvar6--><br>
                        <strong>Dirección 2:</strong> <!--#4DTEXT vWEBvar7--><br>
                        <strong>Ciudad:</strong> <!--#4DTEXT vWEBvar8--><br>
                        <strong>País:</strong> <!--#4DTEXT vWEBvar10--><br>
                        <strong>Email:</strong> <!--#4DTEXT vWEBvar13--><br>
                        <strong>Teléfono:</strong> <!--#4DTEXT vWEBvar11-->
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <span class="receipt-text_title"><strong>DATOS DE INGRESO</strong></span><br>
                        <strong>Fecha de ingreso:</strong> <!--4DTEXT vWEBvar50--><br>
                        <strong>Tienda de recepción:</strong> <!--4DTEXT vWWW_UserID--><br>
                        <strong>Cadena:</strong> <!--4DTEXT vWEBvar60--><br>
                        <strong>Ciudad:</strong> <!--4DTEXT <>BizCity--><br>
                        <strong>Nombre de empleado:</strong> <!--Employee Name HERE-->
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <address>
                        <span class="receipt-text_title"><strong>DATOS DEL EQUIPO</strong></span><br>
                        <strong>Modelo:</strong> <!--4DTEXT vWEBvar23--><br>
                        <strong>Serial/IMEI:</strong> <!--4DTEXT vWEBvar1--><br>
                        <strong>En periodo de garantía:</strong> <!--4DTEXT vWEBvar51--><br>
                        <strong>Buscar mi dispositivo está desactivado:</strong> <!--#4DTEXT vWEBvar20--><br>
                        <strong>Clave de acceso:</strong> <!--4DTEXT vWEBvar52-->
                    </address>
                </div>
                <div class="col-xs-4 text-center">
                    <address>
                        <span class="receipt-text_title"><strong>OTRAS NOTAS</strong></span><br>
                        <strong>Accesorios:</strong><br>
                        <!--4DTEXT vWEBvar53--><br>
                        <strong>Comentarios:</strong><br>
                        <!--4DTEXT vWEBvar54-->
                    </address>
                </div>
                <div class="col-xs-4 text-right">
                    <address>
                        <span class="receipt-text_title"><strong>PROBLEMA REPORTADO POR EL CLIENTE</strong></span><br>
                        <!--#4DTEXT vWEBvar19-->
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 receipt-text_legal-text">
                    Favor leer los términos y condiciones antes de aceptar y firmar las condiciones que rigen la
                    revisión y/o reparación. 1. La garantía del teléfono (en adelante, el Equipo) está sujeta a las
                    condiciones por el fabricante, condiciones que fueron entregadas al momento de la compra del Equipo.
                    2. La garantía no aplica cuando el Equipo muestre señales de contaminación por líquidos, que haya
                    sido intervenido por personal no autorizado, presente golpes, presión excesiva o manipulación de
                    software, entre otras. 3. La reparación tiene una garantía de 3 meses. Si en el transcurso de este
                    periodo ingresa nuevamente por la misma falla, no habrá lugar al cobro de la revisión, salvo el caso
                    que el Equipo este fuera de garantía. 4. Ingram Micro S.A.S. recomienda a los usuarios tener copias
                    de información antes de ingresar el Equipo a Servicio Técnico, debido que la información contenida
                    en el Equipo es de carácter confidencial y propiedad del cliente, toda información (directorio
                    telefónico, ringtones, documentos, juegos, fotos, programas entre otros) será borrada en el proceso
                    técnico. De acuerdo a la vigencia dela ley 1581 del 17 de Octubre de 2012; Por la cual se dictan las
                    disposiciones generales para la protección de datos personales”, se requiere de su autorización para
                    el tratamiento de sus datos personales, así mismo el compartir su información con terceros con fines
                    exclusivamente del servicio, según lo dispone el artículo 9 de dicha Ley. Los celulares deben ser
                    incorporados a la base de datos de la cual es responsable Ingram Micro S.A.S. . Adicionalmente usted
                    podrá ejercer su derecho a conocer, actualizar la suspensión de sus datos personales y conocer la
                    política a través de los canales de atención de nuestra compañía. 5. En caso de actualizaciones de
                    software, reset general y cambio de equipo o tarjeta principal no se garantiza la recuperación de la
                    información contenida en el teléfono tales como: directorio, agenda, fotos, sonidos, aplicaciones,
                    etc. 5. Ingram Micro S.A.S. no responde por protectores de pantalla, antiespias y otros accesorios.
                    Así mismo, tampoco se hará responsable por adhesivos u objetos que el usuario haya expuesto en la
                    unidad ya que estos son destruidos en el proceso de reparación. 6. Es responsabilidad de la persona
                    que ingresa el equipo a reparación acercarse al lugar en que lo entrego para reclamar su equipo
                    reparado. 7. De acuerdo con las políticas de la compañía si un equipo dejado para revisión técnica
                    y/o reparación no es retirado en el trascurso de 90 días a partir de la fecha de recepción del mismo
                    se extinguen las obligaciones de custodia y termino el depositario autoriza a Ingram Micro S.A.S.
                    para disponer del equipo.
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-12">
                    <img width="100%" src="http://i66.tinypic.com/21en4hc.png">
                </div>
            </div>



            @stop