<?php

session_start();
include('connection.php'); 
$conn=OpenCon();

  
if (isset($_POST['Tickets'])) {
    echo $_POST['Tickets'];
}

//$sqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
//";
?>
<!-- <html>
<script>

var NumberOfTickets = document.getElementById("Tickets").value;
document.write("NumberOfTickets");
</script></html> -->