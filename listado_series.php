<?php
require_once('loader.php');

// Obtener listado de películas
if ($_GET && !empty(trim('busqueda'))) {
    $series = $consulta->buscarSerie($bd, 'series', $_GET['busqueda']);
} else {
    // Obtener listado de series
$series = $consulta->listarSeries($bd, 'series');
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listado de Películas y Series</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
    <?php require 'partials/header.php' ?>
    <?php require 'partials/navbar.php' ?>
    <div class="spacer"></div>
    <h2 class="text-center">Listado de Series</h2>
    <div>
        <!-- Formulario para buscar series -->
        <form action="" method="get">
            <input type="submit" value="Buscar">
            <input type="text" name="busqueda">
        </form>
    </div>
    <div class="spacer">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($series as $serie) : ?>
                    <tr>
                        <td><?= $serie['id']; ?></td>
                        <td><?= $serie['title']; ?></td>
                        <td><a href="detalleSerie.php?id=<?= $serie['id']; ?>"><ion-icon name="eye"></ion-icon></a></td>
                        <td><a href="editarSerie.php?id=<?= $serie['id']; ?>"><ion-icon name="create"></ion-icon></a></td>
                        <td><a href="borrarSerie.php?id=<?= $serie['id']; ?>"><ion-icon name="trash"></ion-icon></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>
