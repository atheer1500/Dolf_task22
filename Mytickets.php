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


</head>
<body >
   
<div class="sidenav">
  <a href="homepage.php" ><i class="fa-solid fa-house fa-2xl"></i> <br><br>Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card fa-2xl"></i> <br><br> My Profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user fa-2xl"></i> <br><br> My Account </a>

  <a href="Mytickets.php"class="focused"><i class="fa-solid fa-ticket fa-2xl"></i> <br><br> My Tickets</a>
  <hr>

  <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl"> </i> <br><br> Logout</a>
</div>

<div class="search-container" >
<form  class="search" action="searchevents.php" method="post">
  <input type="text" placeholder="Search for an event.." name="search" id="searchBar" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
<div >
<?php
session_start();
if (!isset($_SESSION["userID"]))
header('location:unauthorized.php');
?>
<?php
include('connection.php'); 
$conn=OpenCon();
//session_start();

//$evID= $_GET['evID'];

$sqlviewuser="SELECT `PaymentMethod`,`NumberOfTickets__`,`EventID` FROM `book` WHERE `UserEmail`='".$_SESSION["userID"]."';";
if ($resultsqlviewuser = mysqli_query($conn, $sqlviewuser))  
 {
  while($rowviewuser =mysqli_fetch_array($resultsqlviewuser))
  {
    $evIDD=$rowviewuser["EventID"];
    $_SESSION['PaymentMethod']=$rowviewuser["PaymentMethod"];
    $_SESSION['NumberOfTickets__']=$rowviewuser["NumberOfTickets__"];

 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`Pic` FROM `events` WHERE `EventID`= ".$evIDD." ;";  
 if ($resultforview = mysqli_query($conn, $sqlforview))  
 {
 while($rowforview =mysqli_fetch_array($resultforview)) 
   { 
    echo "<div class='ViewAllEvents'>";
    $Title = $rowforview['Title'];
    $Time= $rowforview['Time'];
    $Date = $rowforview['Date'];
    $Description= $rowforview['Description'];
    $Pic= $rowforview['Pic'];

    echo "<div ><img src='".$Pic."' height='100px' width='120px' class='PicOfEvent'></div>";

    echo "<div class='TextOfEvent'>";

    echo "<div class='NameOfEvent'>".$Title."</div>";

    echo "<div class='Desc'>".$Description."</div>";
    echo "</div>";

    echo "<div class='Date-Time'><i class='far fa-clock'></i>&ensp;"
    .$Time.
    "&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<i class='far fa-calendar-alt'></i>&ensp;&ensp;"
    .$Date."</div>";

    echo" <div class='NumOfTikContainer'> 
    <div class='NumOfTikNum'>"
    . $_SESSION['NumberOfTickets__'].
    "</div><br><div class='NumOfTikText' style ='margin-right:5.5%;margin-top:-1%;'> Tickets</div></div>";
   //echo "<a href='#' class='editbutton'> Edit</a>";
    echo "</div>";
    //?id=" . $_SESSION['EventID'] .  "


   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

}
}
else  {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
  }

?>
</div>
</div>


</body>
</html>