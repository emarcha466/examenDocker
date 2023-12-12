<?php
use GuzzleHttp\Client;
require_once "vendor/autoload.php";

$client = new Client();
// Datos a enviar
$data = [
    'nombre' => $_POST["nombre"],
];

$response = $client->request('POST', 'http://cartero', 
[
    'form_params' => $data,
]);

echo $response->getBody();
?>