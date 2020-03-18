<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of Api
 *
 * @author judson
 */
class Api {
    
    public static function tokens()
    {
        return array('b5b77ea7bdb0db27462a5256eabb2da5','7830a11bfa81c183941b0edd4810a4d6','c589df2625119a1c7779c8188e57391f');
    }

    public function register($locales,$tokens)
    {
        $url = "http://apiadvisor.climatempo.com.br/api-manager/user-token/$tokens/locales";
        $this->request($url, array('localeId' => $locales), 'put', array('Content-Type: application/x-www-form-urlencoded'), $httpCode);
    }

    //put your code here
    protected function request($url, $data = null, $method = 'get', $headers = array(), &$httpCode = null) 
    {
        $method     = strtolower($method);
        $ch         = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        switch ($method) {
            case 'post':
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;            
            case 'put':
                //curl_setopt($ch, CURLOPT_PUT, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
        }

        if ($headers) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $content    = curl_exec($ch);
        $httpCode   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return $content;
    }
}
