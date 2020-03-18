<?php 

include 'autoload.php';


//array com os codigos das cidades desejadas
$id = array("8569","8571","6895","3239","8623","6532","6533","8820","8823","8866","6541","3329","8974",	"8989",	"6737",	"6870",	"6881",	"3292",	"5330",	"5371",	"3184",	"8620",	"8636",	"8810",	"8884",	"5221",	"8950",	"8966",	"6739",	"6754",);

//foreach para listar os codigos das cidades
foreach($id as $key => $value){       

    //validação de token 
    if ($key < 9 ){ $token = 0;} elseif( $key > 9 &&  $key < 19){$token = 1;}elseif( $key > 19) {$token = 2;}

    //registra os codigos das cidades nos seus respectivos tokens
    $locales = (array) $value;
    $api = new Api();
    $api->register($locales,Api::tokens()[$token]);
            
    $data = Data::fifteenDays($value,$token);

    //Loop para pegar as informações dos 7 dias
    for( $i = 0; $i <= 6;){

        $city = $data["name"];
        $max = $data["data"][$i]["temperature"]["max"]."ºC";
        $min = $data["data"][$i]["temperature"]["min"]."ºC";
        $precipitation = $data["data"][$i]["rain"]["precipitation"]."mm";
        $date = $data["data"][$i]["date"];

        $dbTempo = new dbTempo();
        $dbTempo->setCity($city);
        $dbTempo->setMax($max);
        $dbTempo->setMin($min);
        $dbTempo->setPrecipitation($precipitation);
        $dbTempo->setDate($date);

        $dbTempoDAO = new dbTempoDAO();
        $dbTempoDAO->add($dbTempo);

        $i++;

    }  
}  