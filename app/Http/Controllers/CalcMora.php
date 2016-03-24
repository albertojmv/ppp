<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loan;
use App\Quota;
use App\Surcharge;
use Carbon\Carbon;
//define('__ROOT__', dirname(dirname(__FILE__))); 
require_once('C:\xampp\htdocs\prestamos\vendor\nesbot\carbon\src\Carbon\Carbon.php'); 

function mostrarTexto($texto) {

    echo "<strong>El texto a mostrar es el siguiente: </strong>";

    echo Carbon::now();
}

//Fin de declaración de funciones

mostrarTexto("Me gusta mucho la web de aprenderaprogramar.com");




