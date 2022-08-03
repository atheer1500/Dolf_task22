<?php
// session_start();

// session_destroy();

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
<img src="Unauthorized-Access-PNG.png" width = "200px" style="">
<h1>Unauthorized Page</h1>

<p>
Sorry, you\'re not authorized to access this page.
Please login.
</p><br>
<a href="login.php" class="buttonstyle2" style="display:inline-block; width:25%">Login</a><br>
<a href="homepage.php" class="buttonstyle" style="display:inline-block; width:25%">Go to Home Page</a>


    </div>
</body>
</html>
';
// header('location:login.php');
 
?>