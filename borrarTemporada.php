<?php
// Aquí llamo al archivo que ejecuta los llamados a las clases y crea los objetos necesarios
require_once('loader.php');

// Verificar si se ha proporcionado un ID para borrar la temporada
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Intentar borrar la temporada
    try {
        $consulta->borrarTemporada($bd, 'seasons', $id);
        // Redireccionar con un mensaje de éxito
        header('location:listado_temporadas.php');
        exit(); // Salir del script después de la redirección
    } catch (Exception $e) {
        // Redireccionar con un mensaje de error si falla la eliminación
        header('location:listado_temporadas.php?mensaje=Error al eliminar la temporada: ' . $e->getMessage());
        
        exit(); // Salir del script después de la redirección
    }
} else {
    // Redireccionar con un mensaje de error si no se proporciona un ID válido
    header('location:listado_temporadas.php?mensaje=ID de temporada no válido');
    exit(); // Salir del script después de la redirección
}
