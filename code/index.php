<!DOCTYPE html>
<html lang="en">
<head>
<?php
 include("pelicula.php");
 include("./phpmailer/anima-testmail/mailer.php")
 ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?n=1">
    <title>Netflix 2</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="#" method="POST">
        <div>
            <div class="sectionPostMovie">
                <div class="postMovie">
                    <div class="explMovie">
                       <h1>Pelicula</h1>
                    </div>
                    <input name="nombre" type="text" placeholder="Escribir nombre">
                    <input name= "img" type="text" placeholder="Pegar URL de la imagen">
                    <button name="postMovie" type="submit">Enviar Pelicula</button>
                    <?php if(isset($_POST['postMovie'])) {
                        $name = $_POST["nombre"];
                        $img = $_POST["img"];
                        (new Pelicula())->createMovies($name, $img);
                        $asunto = "Pelicula enviada";
                        $texto = "Se a subido correctamente la pelicula : ".$name." con la imagen : ".$img;
                        $receptor = "alejandrogon1418@gmail.com";
                        (new MailTo())->sendMail($asunto, $texto, $receptor);
                    }; ?>
                </div>
            </div>
            </div>
        </div>
    </form>
        <div class="sectionGetMovies">
        <form class="example" action="#">
            <div class="containerMovies">
            <div class="movies">
               <?php $results = (new Pelicula())->obtenerPeliculas();?>
               <?php foreach($results as $row){ ?>
                   <img src="<?php echo $row['img'] ?? null; ?>" alt="">
                 <p><?php echo $row['nombre'] ?? null; ?></p>
               <?php }; ?>
            </div>
            </div>
            </form>
        </div>
       <div class="sectionSearch">
       <form method="POST" action="#">
             <input name="searchInput"type="text" placeholder="Buscar..." >
             <button name="submitSearch"><i class="fa fa-search"></i></button>
             <div class="searchDiv">
             <?php $namess = $_POST['searchInput'] ?? null;?>
             <?php if(isset($_POST['submitSearch'])){ ?>
                <?php $results = (new Pelicula())->obtenerPelicula($namess)?>
               <?php foreach($results as $row){ ?>
                   <img src="<?php echo $row['img'] ?? null; ?>" alt="">
                 <p><?php echo $row['nombre'] ?? null; ?></p>
               <?php }; ?>
                <?php };?>
             </div>
        </form>
       </div>
</body>
</html>