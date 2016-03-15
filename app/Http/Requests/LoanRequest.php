<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoanRequest extends Request {

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
            'customer_id' => 'required|exists:customers,id|numeric',
            'payday' => 'required',
            'interest' => 'required|numeric',
            'surcharge' => 'required|numeric',
            'amount' => 'required|numeric',
            'quotas' => 'required|numeric',
            'delivery' => 'required',
           
        ];
    }

    public function messages() {
        return [
            'customer_id.required' => 'Debe digitar el código del cliente.',
            'customer_id.exists' => 'El código de cliente digitado no existe.',
            'customer_id.numeric' => 'El código de cliente tiene un formato no valido.',
            'payday.required' => 'Debe digitar los días de gracia para el pago de mora.',
            'interest.required' => 'Debe digitar el % de interés.',
            'interest.numeric' => 'El % de interés debe ser numérico.',
            'surcharge.required' => 'Debe digitar el % de mora.',
            'surcharge.numeric' => 'El % de mora debe ser numérico.',
        ];
    }

}
