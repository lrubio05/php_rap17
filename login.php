<?php

// Solo recepción por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Credenciales de control
    $valid_username = 'usuario_ejemplo';
    $valid_password = 'password123';

    // Extraer datos de la solicitud POST (verifica existencia de keys con isset())
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Realizar la autenticación
    if ($username === $valid_username && $password === $valid_password) {
        // Autenticación exitosa
        $response = [
            'status' => 'success',
            'message' => '¡Autenticación exitosa!'
        ];
        http_response_code(200);
    } else {
        // Autenticación fallida
        $response = [
            'status' => 'error',
            'message' => 'Error en la autenticación. Usuario o contraseña incorrectos.'
        ];
        http_response_code(401);
    }

    // Header JSON y retorno de respuesta
    header('Content-Type: application/json');
    echo json_encode($response);

} else {
    // Error cuando no es POST
    $response = [
        'status' => 'error',
        'message' => 'Método no permitido. Solo se aceptan solicitudes POST.'
    ];
    http_response_code(405);
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>