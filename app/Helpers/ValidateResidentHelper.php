<?php

namespace App\Helpers;

/**
 *
 */
trait ValidateResidentHelper
{
    public function rules()
    {
        return [
            'Nombre' => 'required',
            'Apellidos' => 'required',
            'Telefono' => 'required|numeric',
            'Correo' => 'required|email',
            'Edad' => 'required|numeric',
            'Direccion' => 'required',
            'Comida_Entregada' => 'required|boolean',
            'Observacion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El campo es obligatorio',
            'Apellidos.required' => 'El campo es obligatorio',
            'Telefono.required' => 'El campo es obligatorio',
            'Telefono.numeric' => 'Solo acepta números',
            'Correo.required' => 'El campo es obligatorio',
            'Correo.email' => 'Debe estar en formato de correo',
            'Edad.required' => 'El campo es obligatorio',
            'Edad.numeric' => 'Solo acepta números',
            'Direccion.required' => 'El campo es obligatorio',
            'Comida_Entregada.required' => 'El campo es obligatorio',
            'Comida_Entregada.boolean' => 'Solo puede ser true o false',
            'Observacion.required' => 'El campo es obligatorio',
        ];
    }
}
