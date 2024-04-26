<?php
class ValidarTemporada {
    public function validadorTemporada($temporada){
        $errores = [];
        $title = trim($temporada->getTitle());
        $number = $temporada->getNumber();
        $release_date = $temporada->getReleaseDate();
        $end_date = $temporada->getEndDate();
        $serie_id = $temporada->getSerie();

        if(empty($title)){
            $errores['title'] = "El título es requerido";
        }

        if(empty($number)){
            $errores['number'] = "El número de temporada es requerido";
        } elseif(!is_numeric($number)){
            $errores['number'] = "El número de temporada debe ser un valor numérico";
        }

        if(empty($release_date)){
            $errores['release_date'] = "La fecha de lanzamiento es requerida";
        }

        if(empty($end_date)){
            $errores['end_date'] = "La fecha de finalización es requerida";
        }

        if(empty($serie_id)){
            $errores['serie_id'] = "El ID de la serie es requerido";
        } elseif(!is_numeric($serie_id)){
            $errores['serie_id'] = "El ID de la serie debe ser un valor numérico";
        }

        return $errores;
    }
}
