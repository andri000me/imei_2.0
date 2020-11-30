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
        <div class="container"><a class="navbar-brand" href="admin.php" style="letter-spacing: 1px;font-weight: bold;color: #02182d;">iVerify</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav text-monospace ml-auto" style="letter-spacing: 1px;font-weight: bold;">
                    <li class="nav-item border rounded-0" role="presentation"><a class="nav-link active" href="admin.php">User Accounts</a></li>   
                    <li class="nav-item border rounded-0" role="presentation"><a class="nav-link active" href="admin_reports.php">User Reports</a></li>
                    <li class="nav-item" role="presentation" style="padding: 2px;"><a href="logout.php"><button class="btn btn-info active btn-sm border rounded shadow-sm" type="submit" style="letter-spacing: 1px;">Logout</button></a>   </li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container border rounded" style="background-color: #ffffff;padding-top: 10px;padding-bottom: 10px;margin-top: 20px;margin-bottom: 20px;">
         <p class="text-muted" style="font-size: 14px;letter-spacing: 1px;">Welcome:&nbsp;<span class="text-monospace text-info" style="font-style: italic;"><?php echo $user=$_SESSION["log"]; ?></span></p>
        <p style="font-size: 14px;letter-spacing: 1px;">The table below show all user reports of lost devices.</p>
        <div class="row" style="padding: 15px;">
            <div class="col">
                <h5 class="text-monospace text-center text-info" style="letter-spacing: 1px;font-weight: bold;">User Reports</h5>
                <div class="border rounded shadow-sm" style="padding: 5px;">
                    <div class="table-responsive-md text-monospace" style="font-size: 14px;letter-spacing: 1px;">
                    
                        <?php
                        //
                        $sql="select * from reports order by date_reported desc;";
                        $query=mysqli_query($connect,$sql) or die (mysqli_error($connect));
                        //
                        ?>
                        <table class="table table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th style="background-color: rgba(204,204,204,0.17);">User</th>
                                    <th>Name</th>
                                    <th>Model &amp; Type</th>
                                    <th style="background-color: rgba(204,204,204,0.17);">IMEI</th>
                                    <th>Date Lost</th>
                                    <th style="background-color: rgba(204,204,204,0.17);">Date Reported</th>
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
                                    <td class="text-info" style="background-color: rgba(204,204,204,0.17);"><?php echo $row["user"]; ?></td><td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["model"]; ?> <br><?php echo $row["type"];  ?></td>
                                    <td style="background-color: rgba(204,204,204,0.17);"><?php echo $row["imei"];  ?></td>
                                    <td style="font-size:12px;"><?php echo $row["date_lost"];  ?></td>
                                    <td style="font-size:12px;background-color: rgba(204,204,204,0.17);"><?php echo $row["date_reported"];  ?></td>
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