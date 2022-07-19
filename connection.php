<?php

function OpenCon()
{
$servername = "localhost:3306";
$username = "root";
$pass = "";
$dbname = "event";
  
// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);


// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " 
        . $conn->connect_error);
}
return $conn;}

function closeconn($conn)
{
    $conn->close();
}

?>