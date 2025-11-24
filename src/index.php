<?php
// src/index.php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Ruta de healthcheck: /actuator/health
if ($path === '/actuator/health') {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode([
        'status' => 'UP',
        'timestamp' => date(DATE_ATOM),
    ]);
    exit;
}

// Ruta raíz: /
if ($path === '/' || $path === '') {
    header('Content-Type: text/html; charset=utf-8');
    echo '<h1>PHP Fargate OK</h1><p>Aplicación mínima en puerto 8080.</p>';
    exit;
}

// Cualquier otra ruta
http_response_code(404);
header('Content-Type: application/json');
echo json_encode([
    'status'  => 'NOT_FOUND',
    'path'    => $path,
]);