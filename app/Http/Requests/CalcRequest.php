<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CalcRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'interest' => 'required|numeric',
            'amount' => 'required|numeric',
            'quotas' => 'required|numeric',
            'delivery' => 'required|date_format:d-m-Y',
        ];
    }

    public function messages() {
        return [
            'interest.required' => 'Debe digitar el % de interés.',
            'interest.numeric' => 'El % de interés debe ser numérico.',
            'amount.required' => 'Debe digitar el monto prestado.',
            'amount.numeric' => 'El monto prestado debe ser numérico.',
            'quotas.required' => 'Debe digitar el número de cuotas.',
            'quotas.numeric' => 'El número de cuotas debe ser numérico.',
            'delivery.required' => 'Debe digitar la fecha de inicio del préstamo.',
            'delivery.date_format' => 'El formato de la fecha de inicio del préstamo debe ser (Día – Mes – Año).',
        ];
    }

}
