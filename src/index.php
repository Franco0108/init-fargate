<?php
header('Content-Type: application/json');
echo json_encode([
    "status" => "ok",
    "message" => "PHP básico funcionando correctamente en Fargate",
    "timestamp" => date("c")
]);
