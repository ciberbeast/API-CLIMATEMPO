<?php


/**
 * Description of Data
 *
 * @author judson
 */
class Data extends Api {
    //retorna o json  com as informações solicitadas
    public static function fifteenDays($cityId,$token) 
    {
        $token = parent::tokens()[$token];
        $json_file = file_get_contents("http://apiadvisor.climatempo.com.br/api/v1/forecast/locale/$cityId/days/15?token=$token");
        
        return json_decode($json_file, true);
    }
}
