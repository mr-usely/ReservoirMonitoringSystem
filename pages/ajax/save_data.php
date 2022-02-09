<?php
require_once("../../../../Initialization/initialize.php");

$dam                    = $_POST['Dam'];
$currenwaterlevel       = $_POST['CurrentWaterLevel'];
$spillinglevel          = $_POST['SpillingLevel'];
$datevisit              = $_POST['DateVisit'];
$gateopen               = $_POST['NoGateOpen'];
$dateopened             = $_POST['DateOpened'];
$timeopened             = $_POST['TimeOpened'];
$inflow                 = $_POST['Inflow'];
$iunit                  = $_POST['InflowUnit'];
$outflow                = $_POST['Outflow'];
$ounit                  = $_POST['OutflowUnit'];
$hrsopened              = $_POST['HrsOpened'];
$areasaffected          = $_POST['AreasAffected'];
$statusalertwarning     = $_POST['StatusAlertWarning'];
$sendnotif              = $_POST['SendNotif'];
$createdby              = $_POST['CreatedBy'];
$af                     = '';

for ($i = 0; $i <= count($areasaffected); $i++){
    if($i < (count($areasaffected) - 1)){
        $af .= $areasaffected[$i].', ';
    } else {
        $af .= $areasaffected[$i];
    }
    
}

$sql = "INSERT
INTO ReservoirMonitoringSystem (
     Dam,
     CurrentWaterLevel,
     SpillingLevel,
     DateVisit,
     GateOpen,
     DateOpened,
     TimeOpened,
     Inflow,
     InflowUnit,
     Outflow,
     OutflowUnit,
     HoursOpened,
     AreasAffected,
     StatusAlertWarning,
     DateCreated,
     CreatedBy
) VALUES (
    '{$dam}',
    {$currenwaterlevel},
    {$spillinglevel},
    '{$datevisit}',
    {$gateopen},
    '{$dateopened}',
    '{$timeopened}',
    {$inflow},
    '{$iunit}',
    {$outflow},
    '{$ounit}',
    '{$hrsopened}',
    '{$af}',
    {$statusalertwarning},
    GETDATE(),
    '{$createdby}'
)";

$data = Dynaset::execute($sql);
if($data){
  echo "success";
} else {
    echo "Not Save";
}
?>