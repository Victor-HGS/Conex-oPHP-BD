<?php

include_once(__DIR__.'/../vendor/autoload.php');

echo '<div style="color: #2BF731;
position: sticky;
top: 6.4rem;
z-index: 1;
background-color: black;
padding: 3px;
margin: -10px;">'.date ("d-M-Y").'</div>';
echo "<p>";

use App\model\pessoa;
use App\persistence\ConnectionFactory;
use App\DTOS\SensorDTO;

new Pessoa("Victor Hugo", "952831143");
$connectionFactory = new ConnectionFactory();
$conn = $connectionFactory->getInstance();

$sqlUseBD = "USE chamadasonline";
$stmt = $conn->query($sqlUseBD);

$sensorDTO1 = new SensorDTO(10, 100);
$sensorDTO2 = new SensorDTO(20, 200);

$sqlInsertData = "INSERT INTO dadosbrutos (temperatura,umidade) VALUES ";

$conn->exec($sqlInsertData."(".$sensorDTO1->_temperatura.",".$sensorDTO1->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO2->_temperatura.",".$sensorDTO2->_umidade.");");

$sqlSelectDadosBrutos = "select * from dadosbrutos;";

$stmt = $conn->query($sqlSelectDadosBrutos);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);

echo '<div style = "font-size: 20px;">'."<br>Temperatura -- Umidade<br>".'</div>';
foreach($sensorDataArr as $sensorData){
    echo '<div style = "font-size: 17px;">'."<br></br>".$sensorData['temperatura']." -- ".$sensorData['umidade'].'</div>';
}