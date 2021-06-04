<?php
require_once './database/db.php';

class Pelicula extends Database {

public function createMovies($nombre, $img){
    $query = $this -> connect() -> prepare("INSERT INTO pelicula(nombre,img) VALUES(:nombre, :img)");
    $query -> execute(['nombre'=> $nombre, 'img' => $img]);
    return $query;
}
public function obtenerPeliculas(){
    $array = array();
    $query = $this->connect()->query('SELECT * FROM pelicula');
    if($query->rowCount()){
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            $array[] = $row;
        }
    }
    return $array;
}

public function obtenerPelicula($nombre){
    $array = array();
    $query = $this->connect()->prepare('SELECT * FROM pelicula WHERE nombre = :nombre');
    $query->execute(['nombre' => $nombre]);
    if($query->rowCount()){
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){
            $array[] = $row;
          }
    }
    return $array;
}
}

?>