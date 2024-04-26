<?php
require_once('clases/basemysql.php');
require_once('clases/Consulta.php');
require_once('clases/Pelicula.php');
require_once('clases/ValidarPelicula.php');
require_once('clases/Series.php'); // Agregué la clase Serie que faltaba
require_once('clases/ValidarSeries.php'); // Agregué la clase ValidarSerie que faltaba
require_once('clases/Temporada.php'); // Agregada la clase Temporada
require_once('clases/ValidarTemporada.php'); // Agregada la clase ValidarTemporada



$bd = BaseMysql::conexion();
$consulta = new Consulta();
$validar = new ValidarPelicula();
$validarS = new ValidarSeries();
$validarTemporada = new ValidarTemporada(); // Instancia de ValidarTemporada


