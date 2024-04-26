<?php
require_once("loader.php");

if($_POST){
    // Esto se ejecuta únicamente cuando el usuario acciona el botón de Actualizar Serie
    $series = new Series($_POST['title'], $_POST['release_date'], $_POST['end_date'], $_POST['genre_id']);
    $errores = $validarS->validadorSeries($series); // Asumiendo que existe un método validarSerie en la clase Validador
    // Les recuerdo que el método de validación de errores no está completo, sería bueno que ustedes culminen la validación de todos los campos
    
    if(count($errores) == 0){
        $consulta->actualizarSerie($bd, 'series', $series, $_GET['id']);
    }
}

// Aquí genero el listado de los géneros, para luego usarlos en el select - option del formulario
$generos = $consulta->listarGeneros($bd, 'genres');
// En la variable $serie incorporo los datos de la serie que el usuario desea modificar
$serie = $consulta->detalleSerie($bd, 'series', 'genres', $_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Serie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
</head>
<body>

    <?php require 'partials/header.php' ?>
    <?php require 'partials/navbar.php' ?>
    <div class="spacer"></div>
    <h2 class="text-center">Editar Serie</h2>
    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombreSerie">Nombre</label>
                    <input type="text" class="form-control" name="title" id="nombreSerie" value="<?= $serie['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="release-date">Fecha de Lanzamiento</label>
                    <input type="date" class="form-control" name="release_date" id="release-date" value="<?= $serie['release_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="end-date">Fecha de Finalización</label>
                    <input type="date" class="form-control" name="end_date" id="end-date" value="<?= $serie['end_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="generos">Género de la Serie</label>
                    <select class="form-control" name="genre_id" id="generos">
                        <option value="<?= $serie['genre_id']; ?>"><?= $serie['name']; ?></option>
                        <?php foreach($generos as $genero): ?>
                            <?php if($genero['id'] != $serie['genre_id']): ?>
                                <option value="<?= $genero['id']; ?>"><?= $genero['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Serie</button>
            </form>
            <a href="listado_series.php" class="btn btn-danger">Volver</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7968cc1663.js" crossorigin="anonymous"></script>
</body>
</html>
