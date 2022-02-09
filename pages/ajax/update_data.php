<?php
require_once("../../../../Initialization/initialize.php");

$data          = $_POST['data'];
$id            = $_POST['ID'];
$modifiedby    = $_POST['user'];
$stswarning    = trim($data[10], "    ");
// $dam                    = $_POST['Dam'];
// $currenwaterlevel       = $_POST['CurrentWaterLevel'];
// $spillinglevel          = $_POST['SpillingLevel'];
// $datevisit              = $_POST['DateVisit'];
// $gateopen               = $_POST['NoGateOpen'];
// $dateopened             = $_POST['DateOpened'];
// $timeopened             = $_POST['TimeOpened'];
// $inflow                 = $_POST['Inflow'];
// $iunit                  = $_POST['InflowUnit'];
// $outflow                = $_POST['Outflow'];
// $ounit                  = $_POST['OutflowUnit'];
// $hrsopened              = $_POST['HrsOpened'];
// $areasaffected          = $_POST['AreasAffected'];



$sql = "
UPDATE ReservoirMonitoringSystem Set
        Dam = '{$data[0]}',
        CurrentWaterLevel = {$data[1]},
        SpillingLevel = {$data[2]},
        GateOpen = {$data[3]},
        DateOpened = '{$data[4]}',
        TimeOpened = '{$data[5]}',
        Inflow = {$data[6]},
        Outflow = {$data[7]},
        HoursOpened = '{$data[8]}',
        AreasAffected = '{$data[9]}',
        StatusAlertWarning = {$stswarning},
        DateModified = GETDATE(),
        ModifiedBy = '{$modifiedby}'
WHERE PK = {$id}
";

// echo $sql;
$exec = Dynaset::execute($sql);

if($exec){
    echo "updated";
}

?>


