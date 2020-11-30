<?php
require 'connect.php';

//SIGN UP USER
if (isset($_POST["signup"])){
    //get user input
    $user_id=$_POST["uid"];
    $fname=ucfirst ($_POST["fname"]);
    $lname=ucfirst ($_POST["lname"]);
    $email=$_POST["email"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
    $utype="client";
    //
    $uname=$fname."_".$lname;
    //check if password match
    if($pass1 != $pass2){
         echo "<script type='text/javascript'>alert('The two passwords do not match. Please try again.');
           window.location='signup.php';</script>";
    }
    //if passwords match
    else {
        
        //select email if exists
        $sql0="SELECT * FROM `users` where email = '$email';";
        $query0=mysqli_query($connect,$sql0) or die (mysqli_error($connect));
        $result0=mysqli_fetch_assoc($query0);
        $email0=$result0["email"] ?? '';
        $pass0=$result0["password"] ?? '';
        //
        if($email0 == $email){
            // If email exists
            
            echo "<script type='text/javascript'>alert('This User Already Exist. Please try again.');
           window.location='signup.php';</script>";
        }
        
        else if($email0 != $email){
            
            // If user does not exist
        $password=$pass1;
        $sql="INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `type`, `date_added`) VALUES ('$user_id', '$uname', '$email', '$password', '$utype', current_timestamp());";
        $query=mysqli_query($connect,$sql) or die (mysqli_error($connect));
            
        echo "<script type='text/javascript'>alert('SignUp Successful. Proceed to Login');
        window.location='login.php';</script>";
        }
         else {
        //error
     echo "<script type='text/javascript'>alert('Error Occurred'); window.location='add_device.php';</script>";
    };
    };
};

//LOGIN user
if(isset($_POST["login"])){
    //get values
    $email=$_POST["email"];
    $password=$_POST["password"];
    $type1="admin";
    $type2="client";
    //
    $sqlu="SELECT * FROM `users` WHERE `email`='$email' and `password`='$password' limit 1";
    $queryu=mysqli_query($connect,$sqlu) or die (mysqli_error($connect));
    //
    $urow=mysqli_fetch_assoc($queryu);
    $mail=$urow["email"]??'';
    $typ=$urow["type"]??'';
    $pass=$urow["password"]??'';
    
    //check password match
    if($pass == $password){
      //admin login
        if($typ == $type1){
        $_SESSION["log"]=$email;
        //header("location:admin/admin_home.php");
        echo "<script type='text/javascript'>alert('Admin LogIn Successuful'); window.location='admin.php';</script>";
        
    }
    else if($typ == $type2){
        $_SESSION["log"]=$email;
        //header("location:client/index.php");
        echo "<script type='text/javascript'>alert('User Login Successufull'); window.location='user.php';</script>";
        }
    
    else {
        echo "<script type='text/javascript'>alert(' Error 404. Try Again'); window.location='login.php';</script>";
        
    };
}
    else {
        echo "<script type='text/javascript'>alert('Password Error. Please Try Again'); window.location='login.php';</script>";
        
    };
};

// ADD Device
if(isset($_POST["add"])){
    //get data
    $device_id=$_POST["devid"];
    $user=$_POST["user"];
    $dname=$_POST["dname"];
    $dtype=$_POST["dtype"];
    $dmodel=$_POST["dmodel"];
    $dimei=$_POST["dimei"];
    
      //select imei if exists
        $sql1="SELECT * FROM `devices` where imei = '$dimei';";
        $query1=mysqli_query($connect,$sql1) or die (mysqli_error($connect));
        $result1=mysqli_fetch_assoc($query1);
        $imeid=$result1["imei"] ?? '';
    //
    if ($imeid == $dimei){
        //if imei exists
          echo "<script type='text/javascript'>alert('The device with imei: $dimei has already EXISTS in our system. Please try again.');
           window.location='add_device.php';</script>";
    }
    else if ($imeid != $dimei) {
        //if imei does not exist
    $sqld="INSERT INTO `devices` (`device_id`, `user`, `name`, `type`, `model`, `imei`, `date_added`) VALUES ('$device_id', '$user', '$dname', '$dtype', '$dmodel', '$dimei', current_timestamp());";
    $queryd=mysqli_query($connect,$sqld) or die (mysqli_error($connect));
     echo "<script type='text/javascript'>alert('Success'); window.location='devices.php';</script>";
    }
    else {
        //error
     echo "<script type='text/javascript'>alert('Error Occurred'); window.location='add_device.php';</script>";
    };
   
};

// ADD REPORT
if (isset($_POST["report"])){
    //get values
    $report_id=$_POST["rep_id"];
    $user=$_POST["user"];
    $rname=$_POST["dname"];
    $rtype=$_POST["dtype"];
    $rmodel=$_POST["dmodel"];
    $rimei=$_POST["dimei"];
    $rlost=$_POST["dlost"];
    
    //select imei if exists
      $sql2="SELECT * FROM `reports` where imei = '$rimei';";
        $query2=mysqli_query($connect,$sql2) or die (mysqli_error($connect));
        $result2=mysqli_fetch_assoc($query2);
        $imeir=$result2["imei"] ?? '';
        //
    if ($imeir == $rimei){
        //if exists
         echo "<script type='text/javascript'>alert('The device with imei: $rimei has already been reported LOST. Please try again.');
           window.location='add_report.php';</script>";
    }
    else if($imeir != $rimei){
        //add if data does not exixst
         $sqlr="INSERT INTO `reports` (`report_id`, `user`, `name`, `type`, `model`, `imei`, `date_lost`, `date_reported`) VALUES ('$report_id', '$user', '$rname', '$rtype', '$rmodel', '$rimei', '$rlost', current_timestamp());";
    $queryr=mysqli_query($connect,$sqlr) or die (mysqli_error($connect));
    echo "<script type='text/javascript'>alert('Success'); window.location='reports.php';</script>";
        //
    }
    else {
         //error
     echo "<script type='text/javascript'>alert('Error Occurred'); window.location='add_report.php';</script>";
    };
   
};

?>
<!--== author (c)frankline_bwire ==-->
<!--== @knightlypro ==-->
<!--== (c)Notchcom Solutions Kenya ==-->
<!--== Facebook, Youtube and Instagram  ==-->