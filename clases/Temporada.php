<?php 
class Temporada{
    private $title;
    private $number;
    private $release_date;
    private $end_date;
    private $serie_id;

    public function __construct($title, $number, $release_date, $end_date, $serie_id){
        $this->title = $title;
        $this->number = $number;
        $this->release_date = $release_date;
        $this->end_date = $end_date;
        $this->serie_id = $serie_id;
    }

    // Getters
    public function getTitle(){
        return $this->title;
    }

    public function getNumber(){
        return $this->number;
    }

    public function getReleaseDate(){
        return $this->release_date;
    }

    public function getEndDate(){
        return $this->end_date;
    }

    public function getSerie(){
        return $this->serie_id;
    }

    // Setters
    public function setTitle($title){
        $this->title = $title;
    }

    public function setNumber($number){
        $this->number = $number;
    }

    public function setReleaseDate($release_date){
        $this->release_date = $release_date;
    }

    public function setEndDate($end_date){
        $this->end_date = $end_date;
    }

    public function setSerie($serie_id){
        $this->serie_id = $serie_id;
    }
}
