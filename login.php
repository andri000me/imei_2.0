<!DOCTYPE html>
<html>
<?php
  require 'algo.php';
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
    <div class="container border rounded" style="background-color: #ffffff;padding-top: 10px;padding-bottom: 10px;margin-bottom: 10px;margin-top: 50px;">
        <div class="text-center" style="padding-top: 10px;">
            <h5 class="text-monospace text-info" style="letter-spacing: 1px;"><a class="text-info" href="index.php" style="font-size: 22px;">iVerify</a>.Login<br></h5>
            <p class="text-center" style="font-size: 14px;letter-spacing: 1px;">Use the form below to login into to your account<br></p>
        </div>
        <div class="border rounded shadow-sm" style="padding: 30px;">
            <form method="post" action="login.php" style="padding: 5px;">
                <div class="form-row">
                    <div class="col" style="margin-top: 5px;margin-bottom: 5px;"><label style="letter-spacing: 1px;font-weight: bold;font-size: 14px;">Email</label>
                        <input class="form-control form-control-sm" type="email" placeholder="enter your email address..." name="email" required></div>
                </div>
                <div class="form-row">
                    <div class="col" style="margin-top: 5px;margin-bottom: 5px;"><label style="font-weight: bold;letter-spacing: 1px;font-size: 13px;">Password</label>
                        <input class="form-control form-control-sm" type="password" placeholder="enter your password" name="password" required></div>
                </div>
                <div class="form-row" style="padding-top: 10px;">
                    <div class="col text-center" style="margin-bottom: 5px;margin-top: 5px;"><button class="btn btn-primary active btn-sm text-monospace text-center" type="submit" style="color: rgb(255,255,255);letter-spacing: 1px;font-weight: bold;font-size: 14px;" name="login">Login</button>
                        <p style="letter-spacing: 1px;font-size: 13px;margin-top: 10px;">Don't have an account ?&nbsp;<a href="signup.php" style="letter-spacing: 1px;font-style: italic;font-size: 14px;">Create Account</a>&nbsp;<br></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center"></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
</body>

</html>