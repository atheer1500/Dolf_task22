<?php

session_start();
include('connection.php'); 
$conn=OpenCon();
$sqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
";
var nameValue = document.getElementById("uniqueID").value;