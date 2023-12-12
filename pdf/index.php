<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();
$options = new Options();

//Y debes activar esta opción "TRUE"
$options->set('isRemoteEnabled', TRUE);
$mipdf = new DOMPDF($options);

$mipdf ->getOptions()->setChroot("/var/www/html/");
if($_POST["jamon"]=="si"){
    $mensaje = '<img src="img/jamon.jpg" alt="imagen de jamon">';
}else{
    $mensaje = '<img src="img/chopped.jpg" alt="imagen de chopped">';
}
// Generar el PDF
$html = '<html><body>
<h1>Resolucion de la cesta</h1>
<p>Hola '.$_POST["nombre"].' me complace anunciarle que su cesta de navidad '.$_POST["jamon"].' contiene un jamon</p>
<p>Espero que disfrute de su cesta</p>
'.$mensaje.'
</body></html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output();

// Ruta local en el contenedor "pdf"
//$file_path = '/pdfs/cestaNavidad.pdf';
//$file_name = "CestaNavidad.pdf";
// Guardar el PDF en el directorio local
///file_put_contents($file_name, $output);
echo $output;

?>

