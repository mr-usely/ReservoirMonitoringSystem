<?php
require_once("../../../Initialization/initialize.php");

$date = date("F j\, Y");

$d = Dynaset::load("Select TOP 1 PK, Dam, CurrentWaterLevel, SpillingLevel, DateVisit, GateOpen, DateOpened, CONVERT(varchar(5),TimeOpened, 108) TimeOpened, Inflow, InflowUnit, Outflow, OutflowUnit, CONVERT(varchar(5),HoursOpened, 108) HoursOpened, AreasAffected, StatusAlertWarning, CONVERT(date, DateCreated) DateCreated From ReservoirMonitoringSystem ORDER BY PK DESC");
$row = mssql_fetch_assoc($d);

$sms = "ULFS Reservoir Monitoring System\n
For the status of the {$row['Dam']} Dam as of {$date}.
Dam: Magat: {$row['Dam']}.
Current Water Level: {$row['CurrentWaterLevel']}.
Spilling Level: {$row['SpillingLevel']}.
Date Visit: {$row['DateVisit']}.
Gate Open: {$row['GateOpen']}.
Date Opened: {$row['DateOpened']}.
Time Opened: {$row['TimeOpened']}.
Inflow: {$row['Inflow']} {$row['InflowUnit']}.
Outflow: {$row['Outflow']} {$row['OutflowUnit']}.
Hours Opened: {$row['HoursOpened']}.
Areas Affected: {$row['AreasAffected']}.
Status Alert: {$row['StatusAlertWarning']}.";

$sql = "INSERT INTO MA_MessageOutbox(MobileNo, Keyword, Response, SentTime, Processed, MsgInboxPK, MsgType, SenderID, Priority)":
$sql .="Select CPNumber, 'Reservoir Monitoring System' Keyword, '{$sms}' Response, NULL SentTime, 0 Process, NULL MsgInboxPK, NULL MsgType, NULL SenderID, 1 Priority From consReservoirSMS";

$exec = Dynaset::execute($sql);

if($exec){
    echo "sms sent";
} else {
    echo "not sent";
}
?>