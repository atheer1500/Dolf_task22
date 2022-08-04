<?php
session_start();
if (!isset($_SESSION["userID"]))
header('location:unauthorized.php');
?>
<?php

//session_start();
include('connection.php'); 
$conn=OpenCon();

$evID= $_GET['evID'];
    
$conn=OpenCon();

$SqlFindEvent="SELECT `PaymentMethod` FROM `book` WHERE `UserEmail`='".$_SESSION["userID"]."' AND `EventID`='". $evID ."';";
      $ResultSqlFindEvent=mysqli_query($conn, $SqlFindEvent);
      $SqlFindEventCount = mysqli_num_rows($ResultSqlFindEvent);
      if ($SqlFindEventCount>0)
      {
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src='https://kit.fontawesome.com/191f749b6c.js' crossorigin='anonymous'></script>
         <link rel='stylesheet' href='CSS/Maincss.css' media='all' type='text/css'>
         <link rel='stylesheet' href='CSS/user.css' media='all' type='text/css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <title>View conserts</title>
        <script>
          // function Logout()
          // {
          //    <?php
          //    include_once('Logout.php');
          //    ?>
          // }
          </script>
        
    </head>
    <body >
       
    <div class='sidenav'>
      <a href='homepage.php'><i class='fa-solid fa-house fa-2xl'></i> <br><br>Home</a>
      <a href='UserProfile.php'><i class='fa-solid fa-id-card fa-2xl'></i> <br><br> My Profile </a>
    
      <a href='UserAccount.php'><i class='fa-solid fa-user fa-2xl'></i> <br><br> My Account </a>
    
      <a href='Mytickets.php'><i class='fa-solid fa-ticket fa-2xl'></i> <br><br> My Tickets</a>
      <hr>
    
      <a href='logout.php'><i class='fa-solid fa-right-from-bracket fa-2xl'> </i> <br><br> Logout</a>
    </div>
    
    <h2 style='margin-left:10%;margin-top:10%;'> 
     you have alrady booked this event<br>
     to view your booking <a style ='  text-align: center;
     color: #1c2841;'href='Mytickets.php?evID=".$evID."'>click hear</a></h2>
    
    ";
      }
else{
$SqlForFirstName="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$_SESSION["userID"]."';";

if ($ResultSqlForFirstName = mysqli_query($conn, $SqlForFirstName))  
 {
  while($RowForFirstName =mysqli_fetch_array($ResultSqlForFirstName))
  {
    $_SESSION['FirstName']=$RowForFirstName['FirstName'];
    echo "<h2 >Hi There ! ".$_SESSION['FirstName']."</h2>";
    echo "<h4 > To book an event <br> Please select :</h4>";

  }
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

//,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic`
$SqlForEvents="SELECT `Title`,`Time`,`Date`,`AvailableTickets__`,`Pic`,`ActorID` FROM `events` WHERE `EventID`='".$evID."';";
if ($ResultSqlForEvents = mysqli_query($conn, $SqlForEvents))  
 { 
  while($RowForEvents =mysqli_fetch_array($ResultSqlForEvents))
  {
    $_SESSION['ActorID']=$RowForEvents['ActorID'];
    $_SESSION['Title']=$RowForEvents['Title'];
    $_SESSION['Time']=$RowForEvents['Time'];
    $_SESSION['Date']=$RowForEvents['Date'];
    $_SESSION['AvailableTickets__']=$RowForEvents['AvailableTickets__'];
    $_SESSION['Pic']=$RowForEvents['Pic'];
    //  $_SESSION['Description']=$RowForEvents['Description']; 

    $SqlForActor="SELECT `Name` FROM `actor` WHERE `ActorID`='".$_SESSION['ActorID']."';";
    if ($ResultSqlForActor = mysqli_query($conn, $SqlForActor))  
    {
       while($RowForActor =mysqli_fetch_array($ResultSqlForActor))
     {
      $_SESSION['Name']=$RowForActor['Name'];
    echo"
    <div class='container'>
    <form action='BookAnEvent.php?evID=".$evID."' method='POST'  >
<p>
<span class='lab ' style=' text-align: center; font-size:25px;width: 80%; text-transform: Uppercase;' >".$_SESSION['Title']."</span>
</p>
<p>

    <span class ='pic'>  <img src='".$_SESSION['Pic']."' height='140px' width='140px' id='img'></span>         
</label>
</p>
<p>
<span class='lab ' style='text-align: center; width: 80%;' >
<i class='far fa-clock'></i>&nbsp; &nbsp; &nbsp; &nbsp;".$_SESSION['Time']." &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<i class='far fa-calendar-alt'>&nbsp; &nbsp;&nbsp; &nbsp;</i> ".$_SESSION['Date']."
</span>
</p>

<p>
<span class='lab ' style='text-align: center; width: 80%;' >".$_SESSION['Name']."</span>
</p>

<p>
<label for='Tickets'><span class='lab' >Number Of Tickets : </span></label>
<input type='number' id='Tickets' name='Tickets'min='1' max='".$_SESSION['AvailableTickets__']."' value='1' step='1'>
</p>

<p>
<label for='Tickets'><span class='lab'>Payment Method :</span></label>

<span  class='paymentRadio'>
<input type='radio' id='cash' name='Payment' value='cash'> <label class='paymentRadioText'>Cash</label>
<input type='radio' id='card' name='Payment' value='card'> <label class='paymentRadioText'>Card </label>


</span>
</p>

<input type='submit' style='margin-left:23%;

    border: 1px solid ;
    border-radius: 50px;
    padding: 10px;
    text-decoration: none;
    background-color:#8497b5;
    font-weight: bold;
    font-size: medium;
    text-align: center;
    cursor: pointer;
    color:white;
'  value='Submit'>
</form></div>";
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
// <div class="Select-container">
//       <label> Select a Consort:</label>
//       <select id="Consort">
}
?>