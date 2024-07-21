<?php

function makeMessage()
{
    $message = [
        'name.required' => 'Su nombre es requerido',
        'surname.required' => 'Su apellido es requerido',
        'email.required' => 'Su correo electrónico es requerido',
        'email.email' => 'Por favor ingrese un correo electrónico válido',
        'email.unique' => 'El correo electrónico ya ha sido registrado',
        'phone.required' => 'Su número de teléfono es requerido',
        'password.required' => 'La contraseña es requerida',
    ];

    return $message;
}
