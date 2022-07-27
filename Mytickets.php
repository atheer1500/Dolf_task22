<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css" media="all" type="text/css">
    <link rel="stylesheet" href="CSS/user.css" media="all" type="text/css">
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

</head>
<body >
   
<div class="sidenav">
  <a href="homepage.php" ><i class="fa-solid fa-house"></i> Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card"></i> My profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user"></i> My account </a>

  <a href="Mytickets.php"class="focused"><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>
<div class="search-container" >
<form  class="search" action="search.php" method="post">
  <input type="text" placeholder="Search for an event.." name="search" id="searchBar" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
<div class="bodyTickets">
<?php
include('connection.php'); 
$conn=OpenCon();
session_start();
$sqlviewuser="SELECT `PaymentMethod`,`NumberOfTickets__`,`EventID` FROM `book` WHERE `UserEmail`=`".$_SESSION["userID"]."`;";
if ($resultsqlviewuser = mysqli_query($conn, $sqlviewuser))  
 {
  while($rowviewuser =mysqli_fetch_array($resultsqlviewuser))
  {
    $_SESSION['EventID']=$rowviewuser["EventID"];
    $_SESSION['PaymentMethod']=$rowviewuser["PaymentMethod"];
    $_SESSION['NumberOfTickets__']=$rowviewuser["NumberOfTickets__"];

 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`Pic` FROM `events` WHERE `EventID`= ".$_SESSION['EventID']." ;";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
 while($rowforview =mysqli_fetch_array($result)) 
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
    "</div><br><div class='NumOfTikText'>Available Tickets</div></div>";
   echo "<a href='#' class='editbutton'> Edit</a>";
    echo "</div>";
    //?id=" . $_SESSION['EventID'] .  "


   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}}}

?>
</div>
</div>


</body>
</html>