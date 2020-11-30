<!--== author (c)frankline_bwire ==-->
<!--== @knightlypro ==-->
<!--== (c)Notchcom Solutions Kenya ==-->
<!--== Facebook, Youtube and Instagram  ==-->
<?php
session_start();
$server="localhost";
$user="root";
$password="";
$db="imei";
//Connect to Server
$connect=mysqli_connect($server,$user,$password) or die (mysqli_error($connect));
//echo " connected ";
//Connect to Database
$dbconnect=mysqli_select_db($connect,$db) or die(mysqli_error($connect));
//echo " database_select_success ";
?>