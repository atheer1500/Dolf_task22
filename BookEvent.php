<?php

session_start();
include('connection.php'); 
$conn=OpenCon();

    
$conn=OpenCon();
$SqlForFirstName="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$_SESSION["userID"]."';";

if ($ResultSqlForFirstName = mysqli_query($conn, $SqlForFirstName))  
 {
  while($RowForFirstName =mysqli_fetch_array($ResultSqlForFirstName))
  {
    $_SESSION['FirstName']=$RowForFirstName['FirstName'];
    echo "<h2 style='margin-left:1%;'>Hi There ! ".$_SESSION['FirstName']."</h2>";
    echo "<h4 > To book an event <br> Please select :</h4>";

  }
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}



$SqlForEvents="SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic` FROM `events` WHERE `EventID`=".$_SESSION['EventID'].";";
if ($ResultSqlForEvents = mysqli_query($conn, $SqlForEvents))  
 {
  while($RowForEvents =mysqli_fetch_array($ResultSqlForEvents))
  {echo $RowForEvents['Title'];
    $_SESSION['Title']=$RowForEvents['Title'];
    $_SESSION['Time']=$RowForEvents['Time'];
    $_SESSION['Date']=$RowForEvents['Date'];
    $_SESSION['Description']=$RowForEvents['Description'];
    $_SESSION['AvailableTickets__']=$RowForEvents['AvailableTickets__'];
    $_SESSION['Pic']=$RowForEvents['Pic'];
    echo"
    <form action='#' method='post' name ='' >
<p>
<span class='lab ' style='margin-left: 24%; font-size:25px;width: 90%; text-transform: Uppercase;' >".$_SESSION['Title']."</span>
</p>
<p>

    <span class ='pic'>  <img src='upload.png' height='140px' width='140px' id='img'></span>         
</label>
</p>
<p>
<span class='lab ' style='margin-left: 19%; width: 90%;' >
<i class='far fa-clock'>&nbsp; &nbsp;&nbsp; &nbsp;</i>Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<i class='far fa-calendar-alt'>&nbsp; &nbsp;&nbsp; &nbsp;</i> Time
</span>
</p>

<p>
<span class='lab ' style='margin-left: 32%;' >Actor Name</span>
</p>

<p>
<label for='Tickets'><span class='lab'>Number Of Tickets : </span></label>
<input type='number' id='Tickets' name='Tickets'min='1' max='100'>
</p>

<p>
<label for='Tickets'><span class='lab'>Payment Method :</span></label>

<span style='display: inline-block;' class='paymentRadio'>
<input type='radio' id='cash' name='Payment' value='cash' >Cash
<input type='radio' id='card' name='Payment' value='card' >Card


</span>
</p>


</form>";
   // $_SESSION['ActorID']=$RowForEvents['ActorID'];,`ActorID`
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