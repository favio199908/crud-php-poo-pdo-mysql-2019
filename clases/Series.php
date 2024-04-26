<?php
class Series{
    private $title;
    private $release_date;
    private $end_date;
    private $genre_id;

    public function __construct($title, $release_date, $end_date, $genre_id){
        $this->title = $title;
        $this->release_date = $release_date;
        $this->end_date = $end_date;
        $this->genre_id = $genre_id;
    }

    // Getters
    public function getTitle(){
        return $this->title;
    }
    public function getReleaseDate(){
        return $this->release_date;
    }
    public function getEndDate(){
        return $this->end_date;
    }
    public function getGenre(){
        return $this->genre_id;
    }

    // Setters
    public function setTitle($title){
        $this->title = $title;
    }
    public function setReleaseDate($release_date){
        $this->release_date = $release_date;
    }
    public function setEndDate($end_date){
        $this->end_date = $end_date;
    }
    public function setGenre($genre_id){
        $this->genre_id = $genre_id;
    }
}
