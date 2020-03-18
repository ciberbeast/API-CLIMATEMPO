<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class date {
    
    public static function getWeekDays($getDate,$days) {
        $date = date('Y-m-d', strtotime("$days days",strtotime($getDate))-1);
        $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
        $diasemana_numero = date('w', strtotime($date));
        return $diasemana[$diasemana_numero];
    }
    public static function getDays($getDate,$days){
        return date('d/m/Y', strtotime("$days days",strtotime($getDate))-1);
    }
}

