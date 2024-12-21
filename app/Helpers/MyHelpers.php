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
        'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'password_confirmation.required' => 'La confirmación de la contraseña es requerida',
        'terms.required' => 'Debe aceptar los términos y condiciones',


    ];

    return $message;
}
