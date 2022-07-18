<?php
//,`Description`,`AvailableTickets__`,`Pic`
session_start();
include('connection.php'); 
$conn=OpenCon();
 $sqlforview = "SELECT `Title`,`Time`,`Date`,`Description`,`AvailableTickets__`,`Pic` FROM `events` WHERE `EventID`=  (SELECT `EventID` FROM `edit_event` WHERE `MangerID`='" .$_SESSION['MangerID'] ."');";  
 if ($result = mysqli_query($conn, $sqlforview))  
 {
 while($rowforview =mysqli_fetch_array($result)) 
   { 
    $Title = $rowforview['Title'];
    $Time= $rowforview['Time'];
    $Date = $rowforview['Date'];
    $Description= $rowforview['Description'];
    $AvailableTickets__= $rowforview['AvailableTickets__'];
    $Pic= $rowforview['Pic'];

    echo "<br>".$Title."<br>";
    echo "<br>".$Time."<br>";
    echo "<br>".$Date."<br>"; 
    echo "<br>".$Description."<br>";
    echo "<br>".$AvailableTickets__."<br>";
    echo "<br>".$Pic."<br>";
    

   } 
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>