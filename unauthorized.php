<?php
session_start();

session_destroy();

echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Unauthorized</title>
   
    <style>
    </style>

</head>
<body class="homepage">
<div class="center" style="margin-top:200px;">
<h2>Unauthorized Page</h2>
<img src="Unauthorized-Access-PNG.png" width = "100px">
<p>
Sorry you\'re not authorized.
Please login to access this page.
</p><br>
<a href="login.php" class="buttonstyle2">Login</a>

    </div>
</body>
</html>
';
// header('location:login.php');
 
?>