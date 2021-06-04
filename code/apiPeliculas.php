<?php 


include("pelicula.php");
include("mailer.php");

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
        //segun nico esto lo hace queda lindo. (permite ser leeible le json)
        if ($datos != NULL) {
            $peli->createMovies($datos->name, $datos->img);
                $asunto = "Pelicula enviada";
                $texto = "Se a subido correctamente la pelicula : ".$datos->name." con la imagen : ".$datos->img;
                $receptor = "alejandrogon1418@gmail.com";
                $mail = new MailTo();
                $mail->sendMail($asunto, $texto, $receptor);
                http_response_code(200);
                 //200 todo ok / 201 creaste un nuveo recurso
        } else {
            http_response_code(405);
            //investigar los codigos a dar
        }
        break;
}


?>