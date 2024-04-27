<?php
class AutorCodigo {
    private $nombre;
    private $apellido;
    private $nacionalidad;
    private $fecha_nacimiento;

    public function __construct($nombre, $apellido, $nacionalidad, $fecha_nacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nacionalidad = $nacionalidad;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
}
