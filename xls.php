<?php

include 'autoload.php';

$dbTempoDAO = new dbTempoDAO();
$tabela = '<table border="1">';
$tabela .= '<tr>';
$tabela .= '<td colspan="6">Tabela de E-mails</tr>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td><b>id</b></td>';
$tabela .= '<td><b>city</b></td>';
$tabela .= '<td><b>max</b></td>';
$tabela .= '<td><b>min</b></td>';
$tabela .= '<td><b>precipitation</b></td>';
$tabela .= '<td><b>date</b></td>';
$tabela .= '</tr>';

foreach( $dbTempoDAO->select() as $value){


    $tabela .= '<tr>';
    $tabela .= '<td>'.$value['id'].'</td>';
    $tabela .= '<td>'.$value['city'].'</td>';
    $tabela .= '<td>'.$value['max'].'</td>';
    $tabela .= '<td>'.$value['min'].'</td>';
    $tabela .= '<td>'.$value['precipitation'].'</td>';
    $tabela .= '<td>'.$value['date'].'</td>';
    $tabela .= '</tr>';

}
$tabela .= '</table>';

//Define as configurações que o cabeçalho de excel deve receber
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=Export.xlsx');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
echo $tabela;

?>
