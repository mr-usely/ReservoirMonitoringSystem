<?php
require_once("../../../../Initialization/initialize.php");

$id = $_POST['id'];


$sql = "DELETE ReservoirMonitoringSystem WHERE PK = {$id}";

$execute = Dynaset::execute($sql);

if($execute){
    echo "success";
}
?>