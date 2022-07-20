<?php

session_start();
include('connection.php'); 
$conn=OpenCon();

    
$conn=OpenCon();
$SqlForFirstName="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$_SESSION["id"]."';";

if ($ResultSqlForFirstName = mysqli_query($conn, $SqlForFirstName))  
 {
  while($RowForFirstName =mysqli_fetch_array($ResultSqlForFirstName))
  {
    $_SESSION['FirstName']=$RowForFirstName['FirstName'];
    echo "<h2 class='greatingUser'>Hi there ! ".$_SESSION['FirstName']."</h2>";
    echo "<h4 class='greatingUser2 greatingUser'><br> To book an event <br> Please select :</h4>";

  }
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}



$SqlForEvents="SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic`,`ActorID` FROM `events`;";
if ($ResultSqlForEvents = mysqli_query($conn, $SqlForEvents))  
 {
  while($RowForEvents =mysqli_fetch_array($ResultSqlForEvents))
  {
    $_SESSION['Title']=$RowForEvents['Title'];
    $_SESSION['Time']=$RowForEvents['Time'];
    $_SESSION['Date']=$RowForEvents['Date'];
    $_SESSION['Description']=$RowForEvents['Description'];
    $_SESSION['AvailableTickets__']=$RowForEvents['AvailableTickets__'];
    $_SESSION['Pic']=$RowForEvents['Pic'];
    $_SESSION['ActorID']=$RowForEvents['ActorID'];
// $_SESSION['']=$RowForEvents[''];
  }
 
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
// <div class="Select-container">
//       <label> Select a Consort:</label>
//       <select id="Consort">

?>