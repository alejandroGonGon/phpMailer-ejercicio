<?php 

include("./database/pelicula.php");
include("./mailer/mailer.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$peli = new Pelicula();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['nombre'])) {
            echo json_encode($peli->obtenerPelicula($_GET['nombre']));
        } else {
            echo json_encode($peli->obtenerPeliculas());
        }
        break;
    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if ($datos != NULL) {
            $peli->createMovies($datos->name, $datos->img);
                $asunto = "Pelicula enviada";
                $texto = "Se a subido correctamente la pelicula : ".$datos->name." con la imagen : ".$datos->img;
                $receptor = "alejandrogon1418@gmail.com ";
                $mail = new MailTo();
                $mail->sendMail($asunto, $texto, $receptor);
                http_response_code(200);
        } else {
            http_response_code(405);
        }
        break;
}

?>