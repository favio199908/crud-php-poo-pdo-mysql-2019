<?php
class ValidarSeries{
    public function validadorSeries($serie){
        $errores = [];
        $title = trim($serie->getTitle());
        if(empty($title)){
            $errores['title'] = "El título es un campo requerido";
        }
        // Puedes agregar más validaciones aquí según tus necesidades
        return $errores;
    }
}
