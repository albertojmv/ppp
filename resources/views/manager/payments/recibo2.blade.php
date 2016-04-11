
@extends('master.invoice')

@section('contenido')




<div class="container">
    <div class="row">
        <div class="col-xs-12 receipt-text">
            <center> <div class="invoice-title">
                    <img width="250pt"
                         src="/images/logo_opt.png">
                    <p>Padre Las Casas #69 Plaza Yadisha, 2do. Nivel</p>
                    <p>Tel: 809-233-5034</p></center>
            <h4 class="pull-right"><strong>RECIBO DE INGRESOS:</strong> <!--4DTEXT vWEBvar27--></h4>
        </div>
    </div></div>
<hr>
<div class="row">
    <div class="col-xs-6">
        <address>
            <span class="receipt-text_title"><strong>INFORMACION DEL CLIENTE</strong></span><br>
            <strong>Nombre:</strong> {{$cliente->name}} {{$cliente->lastname}}<br>
            <strong>Cedula:</strong> {{$cliente->cedula}}<br>
            <strong>Dirección:</strong> {{$cliente->address}}<br>

        </address>
    </div>
    <div class="col-xs-6 text-right">
        <address>
            <span class="receipt-text_title"><strong>DATOS DE INGRESO</strong></span><br>
            <strong>Recibo #:</strong> {{$pago->id}}<br>
            <strong>Préstamo #:</strong> {{$prestamo->id}}<br>

            <strong>Cuota #:</strong> {{$cuota->number}}
        </address>
    </div>
</div>
<table width="200" border="0" class="table">
    <tbody>
        <tr>
            <td><center><strong>DETALLES DEL PAGO</strong></center> </td>
</tr>
</tbody>
</table>
<div class="row">
    <div class="col-xs-3">
        <address>
            <span class="receipt-text_title"><strong>MONTO PAGADO</strong></span><br>
            <strong>${{number_format($pago->amount, 2, '.', ',')}}</strong><br>

        </address>
    </div>
    <div class="col-xs-1 text-center">
        <address>
            <span class="receipt-text_title"><strong>MORA</strong></span><br>
            <strong>${{number_format($cuota->surcharge, 2, '.', ',')}}</strong><br>

        </address>
    </div>
    <div class="col-xs-3 text-right">
        <address>
            <span class="receipt-text_title"><strong>MONTO DE CUOTA</strong></span><br>
            <strong> ${{number_format($cuota->amount, 2, '.', ',')}}</strong>
        </address>
    </div>
    <div class="col-xs-2 text-right">
        <address>
            <span class="receipt-text_title"><strong>TOTAL</strong></span><br>
            <strong>  ${{number_format($cuota->amount+$cuota->surcharge, 2, '.', ',')}}</strong>
        </address>
    </div>
     <div class="col-xs-3 text-right">
        <address>
            <span class="receipt-text_title"><strong>PENDIENTE DE CUOTA</strong></span><br>
           <strong>  ${{number_format(($cuota->amount+$cuota->surcharge)-$pago->amount, 2, '.', ',')}}</strong>
        </address>
    </div>
</div>
<strong>Forma de pago:</strong> {{$pago->formofpayment->name}}<br>
<strong>Fecha:</strong> {{$pago->created_at->format('d-m-Y h:i A')}}<br>
<p><strong>Le atendió:</strong> {{$pago->user->name}} {{$pago->user->lastname}} ________________________________</p>
<div class="row">
    <div class="col-xs-12 receipt-text_legal-text">
        Mantenga este recibo como comprobante de su pago. Los datos en nuestro sistema prevalecen en todo momento; en especial en el evento que se originen disputas por pagos fuera de nuestras sucursales a cobradores no-autorizados. Solicita préstamos a través de www.jodamapi.com
    </div>
</div>
<br>





@stop