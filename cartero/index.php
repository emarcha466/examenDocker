<?php

use GuzzleHttp\Client;
require_once "vendor/autoload.php";
require_once "repo/cestaRepo.php";
require_once "entities/cesta.php";


$client = new Client();
$cesta = cestaRepo::getCestaByNombre($_POST["nombre"]);
if($cesta !=null){
    $data = [
        'nombre' => $cesta->getNombre(),
        'jamon'=> $cesta->getJamon(),
        'email' => $cesta->getCorreo()
    ];
    
    //creo el pdf
    $response = $client->request('POST', 'http://pdf', 
    [
        'form_params' => $data
    ]);
    
    $pdf = $response->getBody();
    
    // Guardar el PDF en el directorio local
    //file_put_contents('./pdfs/cestaNavidad.pdf', $pdf);
    
    // Configurar las cabeceras para la descarga del archivo
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="cestaNavidad.pdf"');
    
    //envio del correo
    require_once "entities/ServicioCorreos.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = new ServicioCorreos($cesta->getCorreo(), "cesta", $cesta->getNombre(), $pdf);
        $correo->enviar();
    } else {
        echo "No se ha usado el metodo post";
    }
    
}else{
    echo ("El usuario no tiene cesta");
}

?>