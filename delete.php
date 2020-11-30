<?php
include "algo.php";
if ($report=$_GET["rdelete"]){
    //
    $dsql="DELETE FROM `reports` WHERE `reports`.`report_id` = '$report';";
    $dquery=mysqli_query($connect,$dsql) or die (mysqli_error($connect));
    //
    header("location:reports.php");
};
//
//
if ($device=$_GET["dev_lete"]){
    //
    $dsql="DELETE FROM `devices` WHERE `devices`.`device_id` = '$device';";
    $dquery=mysqli_query($connect,$dsql) or die (mysqli_error($connect));
    //
    header("location:devices.php");
};
//
//
if ($notify=$_GET["not_lete"]){
    //
    $nsql="DELETE FROM `notifications` WHERE `notifications`.`notification_id` = '$notify';";
    $nquery=mysqli_query($connect,$nsql) or die (mysqli_error($connect));
    //
    header("location:notifications.php");
};

?>