<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="CSS/user.css?v=<?php echo time(); ?>" media="all" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View conserts</title>
    <script>
      // function Logout()
      // {
      //    <?php
      //    include_once("Logout.php");
      //    ?>
      // }
      </script>
      <style>
        h2,h4
        {
          text-align: center;
          
        }
        body
        {
          font-family: 'Roboto','Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        </style>
      
</head>
<body >
   
<div class="sidenav">
  <a href="homepage.php"><i class="fa-solid fa-house fa-2xl"></i> <br><br>Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card fa-2xl"></i> <br><br> My Profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user fa-2xl"></i> <br><br> My Account </a>

  <a href="Mytickets.php"><i class="fa-solid fa-ticket fa-2xl"></i> <br><br> My Tickets</a>
  <hr>

  <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl"> </i> <br><br> Logout</a>
</div>


<!-- <i class=' fa-solid fa-hand-wave '></i> -->


<?php include("BookEvent.php"); ?>


</body>
</html>