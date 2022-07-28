<?php
session_start();
if (!isset($_SESSION['MangerID']))
header('location:login.php');
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View Events</title>
    <style>
        .search
{
  margin-left: 15%;
}

.search-container1
{
  margin-left:-50px;
  margin-top:70px;
  margin-bottom: -40px;
 
}
.searchBar1
{
  height: 30px; 
  position: relative; 
  width: 370px; 
  border-radius: 5px ;

}

    </style>

</head>
<body  class="managerPage">
<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerAccount.php"><i class="fa-solid fa-user"></i> My account </a>
  <a href="viewManger.php"  class="focused"><i class="fa-solid fa-calendar-check"></i> My events </a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="Logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> 
</div>

<div class="search-container1" >
<form  class="search" action="search.php" method="post">
  <input class="searchBar1"type="text" placeholder="Search for an event.." name="search" id="searchBar" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>">
  <button type="submit" ><i class="fa fa-search"></i></button>
</form>
</div>
<div id="events" style="margin-top: 6%;" >

<?php
include('connection.php'); 
$conn=OpenCon();
$sqlfortable="SELECT `EventID` FROM `edit_event` WHERE `MangerID`='" .$_SESSION['MangerID'] ."';";
if ($resultsqlfortable = mysqli_query($conn, $sqlfortable))  
 {
  while($rowfortable =mysqli_fetch_array($resultsqlfortable))
  {
    $_SESSION['EventID']=$rowfortable["EventID"];
 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic` FROM `events` WHERE `EventID`= ".$_SESSION['EventID']." ;";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
  //images\ab.jbg
 while($rowforview =mysqli_fetch_array($result)) 
   { 
    echo "<div class='ViewAllEvents'>";
    $Title = $rowforview['Title'];
    $Time= $rowforview['Time'];
    $Date = $rowforview['Date'];
    $Description= $rowforview['Description'];
    $AvailableTickets__= $rowforview['AvailableTickets__'];
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
    .$AvailableTickets__.
    "</div><br><div class='NumOfTikText'>Available Tickets</div></div>";
   echo " class=<a href='ManagerEditEvent.php?id=" . $_SESSION['EventID'] .  "' class='editbutton'> Edit</a>";
    echo "</div>";

   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}}}

?>
</div>










</body>
</html>
