<!DOCTYPE html>
<html>
<?php
    include 'algo.php';
    $user=$_SESSION["log"];
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>imei_2.0</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #012140;">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color: #e9ecef;padding-right: 40px;padding-left: 40px;">
        <div class="container"><a class="navbar-brand" href="user.php" style="letter-spacing: 1px;font-weight: bold;color: #02182d;">iVerify</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav text-monospace ml-auto" style="letter-spacing: 1px;font-weight: bold;">
                    <li class="nav-item border rounded-0" role="presentation"><a class="nav-link active" href="user.php">Home</a></li>
                   
                    <li class="nav-item border rounded-0" role="presentation" style="padding: 8px;">
                        <div class="nav-item dropdown"><a class="dropdown-toggle text-muted" data-toggle="dropdown" aria-expanded="false" href="#">Devices</a>
                            <div class="dropdown-menu text-center" role="menu" style="font-size: 14px;letter-spacing: 1px;background-color: rgba(255,255,255,0);"><a class="dropdown-item border rounded-0" role="presentation" href="add_device.php" style="background-color: #ffffff;">Add Device</a><a class="dropdown-item border rounded-0" role="presentation" href="devices.php" style="background-color: #ffffff;">My Devices</a></div>
                        </div>
                    </li>      
                     <li class="nav-item border rounded-0" role="presentation" style="padding: 8px;">
                        <div class="nav-item dropdown"><a class="dropdown-toggle text-muted" data-toggle="dropdown" aria-expanded="false" href="#">Reports</a>
                            <div class="dropdown-menu text-center" role="menu" style="font-size: 14px;letter-spacing: 1px;background-color: rgba(255,255,255,0);"><a class="dropdown-item border rounded-0" role="presentation" href="add_report.php" style="background-color: #ffffff;">Add Report</a><a class="dropdown-item border rounded-0" role="presentation" href="reports.php" style="background-color: #ffffff;">My Reports</a></div>
                        </div>
                    </li>
                    <li class="nav-item border rounded-0" role="presentation"><a class="nav-link" href="notifications.php">Notifications</a></li>
                    <li class="nav-item" role="presentation" style="padding: 2px;"><a href="logout.php"><button class="btn btn-info active btn-sm border rounded shadow-sm" type="submit" style="letter-spacing: 1px;">Logout</button></a>   </li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container border rounded" style="background-color: #ffffff;padding-top: 10px;padding-bottom: 10px;margin-top: 20px;margin-bottom: 20px;">
        <p class="text-muted" style="font-size: 14px;letter-spacing: 1px;">Welcome:&nbsp;<span class="text-monospace text-info" style="font-style: italic;"><?php echo $user=$_SESSION["log"]; ?></span></p>
        <h5 class="text-info">How to Verify the authenticity of your mobile device ?<br></h5>
        <p style="font-size: 14px;letter-spacing: 1px;">Instructions:&nbsp;Please follow the steps below in order to verify the IMEI Code of your mobile device<br></p>
        <ol style="font-size: 14px;letter-spacing: 1px;margin-bottom: 10px;">
            <li>Take out your device</li>
            <li>Dial&nbsp;<span class="text-monospace flash animated infinite" style="letter-spacing: 1px;font-style: italic;font-size: 14px;color: #d12976;">*#06#</span>&nbsp;and send</li>
            <li>You will see a unique set of codes labeled "<span class="text-monospace" style="font-size: 14px;font-style: italic;letter-spacing: 1px;">IMEI</span>" on your screen</li>
        </ol>
        <p style="font-size: 14px;letter-spacing: 1px;">Enter the IMEI code in the blank space provided and press "<span class="text-info" style="font-style: italic;">Validate</span>". The authenticity of the mobile device corresponding with the IMEI code will be displayed for you to compare and verify
            if your device is genuine or not.<br></p>
        <div class="row" style="padding: 15px;">
            <div class="col">
                <div class="border rounded shadow-sm" style="padding: 5px;">
                    <form style="padding: 6px;" action="user.php" method="post">
                        <input type="text" name="not_id" value="not-<?php echo rand(100,999). rand(100,999);?>" hidden readonly required >
                        <div class="form-row" style="padding: 5px;">
                            <div class="col text-center" style="padding-right: 20px;padding-left: 20px;"><label style="font-size: 14px;letter-spacing: 1px;font-weight: bold;">Enter your IMEI Code</label><input class="form-control form-control-sm" type="text" placeholder="enter code here..." name="code" required></div>
                        </div>
                        <div class="form-row" style="padding: 5px;">
                            <div class="col text-center"><button class="btn btn-info btn-sm text-monospace text-center" type="submit" style="font-weight: bold;letter-spacing: 1px;" name="validate">Validate</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["validate"])){
            $code=$_POST["code"];
            $not_id=$_POST["not_id"];
            //echo "$code";
            $user;
            $sqlv="SELECT * FROM `reports` WHERE `imei` LIKE '$code' or 'imei' = '$code' limit 1;";
            $queryv=mysqli_query($connect,$sqlv) or die (mysqli_error($connect));
            $rowv=mysqli_fetch_assoc($queryv);
            $imei=$rowv["imei"] ?? '';
            $name=$rowv["name"] ?? '';
            $type=$rowv["type"] ?? '';
            $userv=$rowv["user"] ?? '';
            $name_type=$name.'-'.$type;
            //
        if ($imei == $code){
            //if defect found
        echo $defect = "<div class='row' style='margin-bottom: 10px;'>
            <div class='col-md-3'></div>
            <div class='col-md-6'>
                <div class='border rounded shadow-sm' style='padding: 20px;'>
                    <p class='text-monospace text-muted' style='font-size: 12px;letter-spacing: 1px;font-style: italic;margin-bottom: 5px;'>Device information:</p>
                    <div class='text-center'><i class='fas fa-thumbs-down' style='font-size: 25px;color: #be4040;'></i></div>
                    <p class='text-center' style='margin-bottom: 5px;font-size: 14px;letter-spacing: 1px;'>Your $name device with imei number:&nbsp;<span class='text-monospace flash animated infinite' style='color: #d12976;letter-spacing: 1px;font-weight: bold;font-style: italic;'>$imei</span> has been reported <strong>LOST</strong>. You will
                        be contacted for further details.</p>
                </div>
            </div>
            <div class='col-md-3'></div>
        </div>";
            //add notification
            $notification="Your $name_type device with IMEI No: $code has been found by User: $user.";
            
            $sqln="INSERT INTO `notifications` (`notification_id`, `user`, `reporter_id`, `name_type`, `imei`, `notification`, `date_added`) VALUES ('$not_id', '$user', '$userv', '$name_type', '$imei','$notification', current_timestamp());";
            $queryn=mysqli_query($connect,$sqln) or die (mysqli_error($connect));
        }
        // if has no defect
        else if($code != $imei){
            //check devices table
        $sqld="SELECT * from devices where imei = '$code' limit 1;";
        $queryd=mysqli_query($connect,$sqld) or die (mysqli_error($connect));
        $rowd=mysqli_fetch_assoc($queryd);
        $named=$rowd["name"] ?? '';
        $imeid=$rowd["imei"] ?? '';
        
        echo $no_defect = "
        <div class='row' style='margin-bottom: 10px;'>
            <div class='col-md-3'></div>
            <div class='col-md-6'>
                <div class='border rounded shadow-sm' style='padding: 20px;'>
                    <p class='text-monospace text-muted' style='font-size: 12px;letter-spacing: 1px;font-style: italic;margin-bottom: 5px;'>Device information:</p>
                    <div class='text-center'><i class='fas fa-thumbs-up' style='font-size: 25px;color: #37b724;'></i></div>
                    <p class='text-center' style='margin-bottom: 5px;font-size: 14px;letter-spacing: 1px;'>Your <strong>$named</strong> device with imei number:&nbsp;<span class='text-monospace flash animated infinite' style='color: #d12976;letter-spacing: 1px;font-weight: bold;font-style: italic;'>$code</span> has been successfully Validated and found with
                        <strong>NO</strong> defects.</p>
                </div>
            </div>
            <div class='col-md-3'></div>
        </div> ";
        };
            };
        ?>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col text-center item" style="padding-top: 5px;padding-bottom: 5px;">
                        <ul>
                            <li><a href="#"><i class="fas fa-location-arrow" style="font-size: 18px;"></i>&nbsp; 1234 Street - Nakuru Kenya</a></li>
                            <li style="margin: 2px;"><a href="#"><i class="fa fa-phone-square" style="font-size: 18px;"></i>&nbsp; (123) 456-789</a></li>
                            <li style="margin: 2px;"><a href="#"><i class="fas fa-envelope-open-text" style="font-size: 18px;"></i>&nbsp; info@iverifysystem.com</a></li>
                        </ul>
                    </div>
                    <div class="col text-center item social" style="padding-top: 5px;padding-bottom: 5px;">
                        <p class="copyright">&nbsp;© iVerify. IMEI Device Verification System 2020</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
</body>

</html>