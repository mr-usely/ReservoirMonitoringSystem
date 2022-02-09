<?php 
  include_once('../../../Initialization/Initialize.php');

  $d = Dynaset::load("Select TOP 1 PK, Dam, CurrentWaterLevel, SpillingLevel, DateVisit, GateOpen, DateOpened, CONVERT(varchar(5),TimeOpened, 108) TimeOpened, Inflow, InflowUnit, Outflow, OutflowUnit, CONVERT(varchar(5),HoursOpened, 108) HoursOpened, AreasAffected, StatusAlertWarning, CONVERT(date, DateCreated) DateCreated From ReservoirMonitoringSystem ORDER BY PK DESC");
  $row = mssql_fetch_assoc($d);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr th {
            font-family: 'Segoe UI Semilight', 'Frutiger', 'Frutiger Linotype', 'Dejavu Sans', 'Helvetica Neue', 'Arial', sans-serif;
            font-size: 15px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 3px 5px 3px 5px;
        }
        .tbl-row td {
            font-family: 'Segoe UI Semilight', 'Frutiger', 'Frutiger Linotype', 'Dejavu Sans', 'Helvetica Neue', 'Arial', sans-serif;
            font-size: 15px;
            border: 1px solid #ddd;
            padding: 3px 5px 3px 5px;
            text-align: right;
        }
    </style>
</head>

<body>

<div class="container body">

<table style="border: none; font-family: Segoe UI Semilight,Frutiger,Frutiger Linotype,Dejavu Sans,Helvetica Neue,Arial,sans-serif;font-size:16px;text-align:left;">
        <tr>
            <td align="left">Dear All,</br></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kindly refer on below table for the status of the <?php echo $row['Dam']; ?> Dam as of <?php echo date("M jS, Y", strtotime($row['DateCreated']))?>. </td>
        </tr>
</table>

 
 
<hr style="color:#ddd;"/>
<br />
<table style="background-color:whitesmoke;border-collapse:collapse;border:2px solid #ddd;font-family:Segoe UI, sans-serif;font-size:11px;">
    <thead>
        <tr>
            <th>Dam</th>
            <th>Current Water</th>
            <th>Spilling Level</th>
            <th>No. of Gate</th>
            <th>Date Opened</th>
            <th>Time Opened</th>
            <th>Inflow</th>
            <th>Outflow</th>
            <th>Hours Opened</th>
            <th>Areas Affected</th>
            <th>Status Alert Warning</th>
        </tr>
    </thead>
    <tbody>
        <tr class="tbl-row">
            <td><?php echo $row['Dam']; ?></td>
            <td><?php echo $row['CurrentWaterLevel']; ?></td>
            <td><?php echo $row['SpillingLevel']; ?></td>
            <td><?php echo $row['GateOpen']; ?></td>
            <td><?php echo $row['DateOpened']; ?></td>
            <td><?php echo $row['TimeOpened']; ?></td>
            <td><?php echo $row['Inflow'].' '.$row['InflowUnit']; ?></td>
            <td><?php echo $row['Outflow'].' '.$row['OutflowUnit']; ?></td>
            <td><?php echo $row['HoursOpened']; ?></td>
            <td><?php echo $row['AreasAffected']; ?></td>
            <td><?php echo $row['StatusAlertWarning']; ?></td>
        </tr>
    </tbody>
</table>
 


<br/><br/><br/>
    <hr style="color:#ddd;"/>
</div>
 
    <div class="tag" style="font-size:11px;text-align:center;font-family: Segoe UI Semilight;color:#777;"
        <i>Please do not reply to this email address as all responses are directed to an unattended mailbox, and will not receive a response.<i>
    </div>
</body>
</html>