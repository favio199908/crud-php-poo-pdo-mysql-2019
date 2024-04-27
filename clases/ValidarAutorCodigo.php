<?php
class ValidarAutorCodigo {
    public function validarAutor($autor) {
        $errores = [];
        $nombre = trim($autor->getNombre());
        if (empty($nombre)) {
            $errores['nombre'] = "El nombre del autor es requerido";
        }

        $apellido = trim($autor->getApellido());
        if (empty($apellido)) {
            $errores['apellido'] = "El apellido del autor es requerido";
        }

        $nacionalidad = trim($autor->getNacionalidad());
        if (empty($nacionalidad)) {
            $errores['nacionalidad'] = "La nacionalidad del autor es requerida";
        }

        // Validar la fecha de nacimiento si se desea
        // Podrías agregar más validaciones según tus necesidades

        return $errores;
    }
}
