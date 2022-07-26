<?php

if (isset($_POST['Tickets'])&&isset($_POST['Payment'])) 
{
session_start();
include('connection.php'); 
$conn=OpenCon();
// $booked=$_POST['Tickets'];
// $Available=$_SESSION['AvailableTickets__'];
// $newTicketsNumber=($booked)-($Available);
$SqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`)
VALUES ('".$_POST['Payment']."','".$_POST['Tickets']."','".$_SESSION["userID"]."','".$_SESSION['EventID']."');";

$SqlUpdateEvent="UPDATE `events` SET `AvailableTickets__`='".($_SESSION['AvailableTickets__']-$_POST['Tickets'])."' WHERE `EventID`='".$_SESSION['EventID']."';";
if ($ResultSqlInsertToBook= mysqli_query($conn, $SqlInsertToBook)&&$ResultSqlUpdateEvent= mysqli_query($conn, $SqlUpdateEvent))  
{
  echo "Booked sucssfly ";
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}


?>
<!-- <html>
<script>

var NumberOfTickets = document.getElementById("Tickets").value;
document.write("NumberOfTickets");
</script></html> -->