    <link rel='shortcut icon' href='assets/img/logo.png' type='image/x-icon'>

    <?php

    if (!$_POST['cod'] && !$_POST['inscrito']) {
        header("Location: admin.php");
    }

    include './controller/InscritoController.php';
    session_start();
    $curso = $_POST['cod'];
    $inscrito = $_POST['inscrito'];
    $usuario = $_SESSION['Usuario'];
    $datos = InscritoController::datosCertificado($inscrito, $usuario, $curso);

    $html = "
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Certificado</title>
</head>
    
<body>
    <style>
    body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 12px double #6d6d6d; 
  
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    text-align: center;
}

h3 {
    text-align: center;
}

img{
    width: 66px;
    height: 56px;
    margin-top: 1%;
}

#firma{
    width: 150px;
    height: auto;
    display: block;
    margin-left: 325px;
}

h4{
    font-weight: 1;
    font-size: 25px;
    margin-top: -5%;
    margin-left: 8%;
}


p {
    margin-bottom: 10px;
    text-align: center;
}

.firma {
    text-align: center;
    margin-top: 1%;
}

.linea {
    margin-left: 37.3%;
    width: 200px;
    border-top: 1px solid #000;
    margin-top: 20%;
   
  }
    </style>
    <div class='container'>
        <img src='assets/img/logo.png' alt='logo'>
        <h4>Learning-Em</h4>
        <h1>Certificado de Aprobación</h1>
        <p>Este certifica que</p>
        <h2>{$datos['nombre']} {$datos['apellido']}</h2>
        <p>ha completado satisfactoriamente el curso en línea titulado:</p>
        <h3>{$datos['nombreCurso']}</h3>
        <p>ofrecido por Learning-EM</p>
        <p>Fecha de finalización: {$datos['fechaFin']}</p>
        <img id='firma' src='assets/img/firma.png' alt='logo'>
        <div style='margin-top: -100px'>
            <div class='linea'></div>
            <p class='firma'>Enrique Andrade</p>
            <p>Coordinador de Learning-EM</p>
        </div>
    </div>
</body>

</html>";

    // Requerir el archivo de php que hay dentro de dompdf
    require_once "dompdf/autoload.inc.php";
    // para asi poder crear un objeto
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();
    $options = $dompdf->getOptions();
    $options->setDefaultFont('Courier');
    $dompdf->setOptions($options);
    // Dentro del loadHtml() es donde va lo que queramos imprimir
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    // $dompdf->setPaper('letter');
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('letter', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    // False para que no se descargue, sino para que aparezca en el navegador
    $dompdf->stream("Certificado {$datos['nombreCurso']}.pdf", array("Attachment" => false));
