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
        <p style="font-size: 14px;letter-spacing: 1px;">Instructions:&nbsp;Please follow the steps below in order to get the IMEI Code of your mobile device<br></p>
        <ol style="font-size: 14px;letter-spacing: 1px;margin-bottom: 10px;">
            <li>Take out your device</li>
            <li>Dial&nbsp;<span class="text-monospace flash animated infinite" style="letter-spacing: 1px;font-style: italic;font-size: 14px;color: #d12976;">*#06#</span>&nbsp;and send</li>
            <li>You will see a unique set of codes labeled "<span class="text-monospace" style="font-size: 14px;font-style: italic;letter-spacing: 1px;">IMEI</span>" on your screen</li>
        </ol>
        <p style="font-size: 14px;letter-spacing: 1px;">The table below show all devices registered by you, the user.</p>
        <div class="row" style="padding: 15px;">
            <div class="col">
                <h5 class="text-monospace text-center text-info" style="letter-spacing: 1px;font-weight: bold;">My Devices</h5>
                <div class="border rounded shadow-sm" style="padding: 5px;">
                    <div class="table-responsive-md text-monospace" style="font-size: 14px;letter-spacing: 1px;">
                    
                        <?php
                        //
                        $sql="select * from devices where user = '$user' order by date_added desc;";
                        $query=mysqli_query($connect,$sql) or die (mysqli_error($connect));
                        //
                        ?>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Model &amp; Type</th>
                                    <th style="background-color: rgba(204,204,204,0.17);">IMEI</th>
                                    <th>Date added</th>
                                </tr>
                            </thead>
                            <?php
                            // 
                            //if ($query == true){
                      while($row=mysqli_fetch_assoc($query))
                            {  
                            //
                            ?>
                            <tbody>
                                <tr class="text-center">
                                    <td><?php echo $row["name"];  ?></td>
                                    <td><?php echo $row["model"]; ?> <br><?php echo $row["type"];  ?></td>
                                    <td style="background-color: rgba(204,204,204,0.17);"><?php echo $row["imei"];  ?></td>
                                    <td style="font-size:12px;"><?php echo $row["date_added"];  ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group"><!--a class="btn btn-warning text-monospace" role="button" style="font-size: 12px;letter-spacing: 1px;font-weight: bold;">Report Lost</a--><a class="btn btn-warning  text-monospace" role="button" style="font-size: 12px;letter-spacing: 1px;font-weight: bold;" href="delete.php?dev_lete=<?php echo $row["device_id"];?>">Delete</a></div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                            };
                                ?>
                             </table>
                    </div>
                            
              <!--                  echo " 
                                </table>
                    </div>";
                            }
                    else if
                        (mysqli_field_count($query) <= 0)
                    {
                        echo "
                          
                    <div class='row' style='margin-bottom: 10px;'>
                        <div class='col-md-3'></div>
                        <div class='col-md-6'>
                            <div class='border rounded shadow-sm' style='padding: 10px;'>
                                <div class='text-center text-muted'><i class='fas fa-times' style='font-size: 25px;'></i></div>
                                <p class='text-monospace text-center text-muted' style='margin-bottom: 5px;font-size: 14px;letter-spacing: 1px;'>Device List Empty</p>
                                <p class='text-monospace text-center text-muted' style='margin-bottom: 5px;font-size: 14px;letter-spacing: 1px;'><a class='text-info border rounded' href='add_device.php' style='font-weight: bold;font-style: italic;letter-spacing: 1px;font-size: 14px;padding: 2px;'>add new device</a></p>
                            </div>
                        </div>
                        <div class='col-md-3'></div>
                    </div>
                    "; 
                    };
                    ?>
-->
                </div>
            </div>
        </div>
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