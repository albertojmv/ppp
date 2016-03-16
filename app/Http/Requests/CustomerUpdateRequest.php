<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerUpdateRequest extends Request {

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
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'cedula' => 'required',
            'email' => 'email',
            'birthdate' => 'required|date_format:d-m-Y',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Debe digitar el nombre del cliente.',
            'lastname.required' => 'Debe digitar el apellido del cliente.',
            'phone.required' => 'Debe digitar un teléfono.',
            'cedula.required' => 'Debe digitar el número de cedula.',
            'email.email' => 'El correo electrónico no es válido.',
            'birthdate.required' => 'Debe digitar la fecha de nacimiento.',
            'birthdate.date_format' => 'El formato de la fecha de nacimiento debe ser (Día – Mes – Año).',
        ];
    }

}
