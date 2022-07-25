
<?php
 
 // servername => localhost
 // username => root
 // password => empty
 // database name => event
 $conn = mysqli_connect("localhost", "root", "", "event");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  

 // take the data from the form 
 $name =  $_REQUEST['manager_name'];
 $pass =  $_REQUEST['manager_pass'];
 $email = $_REQUEST['manager_email']; 
 
 //GET THE ADMIN ID
$query = "SELECT * FROM `admin`";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);

$admin_id = $row[2];
  
 // insert query
 $sql = "INSERT INTO  `event_manger`  VALUES ('$pass',
     '$email','$name', '' ,'$admin_id')";
  




//Check if manager already exists.

$conflictQuery = "SELECT * FROM `event_manger` WHERE `MangerEmail` = '$email'";
$conflictResult=mysqli_query($conn, $conflictQuery);
$conflictCount = mysqli_num_rows($conflictResult);

 if ($conflictCount > 0){
    header('location: AdminNewManager.php?problem=ADDERROR1');
 }

 else if(mysqli_query($conn, $sql)){
   header('location: AdminNewManager.php?problem=ADD'); //go back to the add page

 }
 
 else
    header('location: AdminNewManager.php?problem=ADDERROR')
 

 ?>