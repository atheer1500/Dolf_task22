<?php

function OpenCon()
{
$servername = "localhost";
$username = "id19368729_maisaaahmadali";
$pass = "SAVCOrVt]}D4D-VZ";
$dbname = "id19368729_event";
//mysqli_connect("localhost", "id19368729_maisaaahmadali", "SAVCOrVt]}D4D-VZ", "id19368729_event");
  
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