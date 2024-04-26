<?php
require_once('loader.php');

// Inicializar la variable $errores
$errores = [];

if($_POST){
    $temporada = new Temporada($_POST['title'], $_POST['number'], $_POST['release_date'], $_POST['end_date'], $_POST['serie_id']); // Ajuste aquí
    $errores = $validarTemporada->validadorTemporada($temporada); // Ajuste aquí
    if (count($errores) == 0){
        $consulta->guardarTemporada($bd, 'seasons', $temporada);
    }
}

$generos = $consulta->listarGeneros($bd, 'genres');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de Temporadas - Daniel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    <?php require 'partials/navbar.php' ?>
    <div class="spacer"></div>
    <h2 class="text-center">Agregar Temporada</h2>
    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-2">
            <?php if(isset($errores) && count($errores) > 0):?>
                <ul class="alert alert-danger">
                    <?php foreach ($errores as $error) :?>
                        <li><?=$error ;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombreTemporada">Título</label>
                    <input type="text" class="form-control" name="title" id="nombreTemporada">
                </div>
                <div class="form-group">
                    <label for="numeroTemporada">Número de Temporada</label> <!-- Cambio de release_date a number -->
                    <input type="text" class="form-control" name="number" id="numeroTemporada"> <!-- Cambio de release_date a number -->
                </div>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="release_date" id="fechaInicio">
                </div>
                <div class="form-group">
                    <label for="fechaFin">Fecha de Fin</label>
                    <input type="date" class="form-control" name="end_date" id="fechaFin">
                </div>
                <div class="form-group">
                    <label for="generos">Género de la Temporada</label>
                    <select class="form-control" name="serie_id" id="generos"> <!-- Cambio de genre_id a serie_id -->
                        <option value="#" disabled>Seleccione serie...</option>
                        <?php foreach ($generos as $genero) :?>
                            <option value="<?=$genero['id'];?>"><?=$genero['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Temporada</button>
            </form>
            <a href="index.php" class="btn btn-danger">Volver</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
