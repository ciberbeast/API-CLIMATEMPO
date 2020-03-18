<?php 
class dbTempo {

    public $id;
    public $city;
    public $max;
    public $min;
    public $precipitation;
    public $date;

    public function setId($id){
        $this->id = $id;
    }
    public function setCity($city){
        $this->city = $city;
    }
    public function setMax($max){
        $this->max = $max;
    }
    public function setMin($min){
        $this->min = $min;
    }
    public function setPrecipitation($precipitation){
        $this->precipitation = $precipitation;
    }
    public function setDate($date){
        $this->date = $date;
    }

    public function getId(){
        return $this->id;
    }
    public function getCity(){
        return $this->city;
    }
    public function getMax(){
        return $this->max;
    }
    public function getMin(){
        return $this->min;
    }
    public function getPrecipitation(){
        return $this->precipitation;
    }
    public function getDate(){
        return $this->date;
    }

}