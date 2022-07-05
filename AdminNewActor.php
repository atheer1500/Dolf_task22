


<?php
 
 // servername => localhost
 // username => root
 // password => empty
 // database name => staff
 $conn = mysqli_connect("localhost", "root", "", "event");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
//Get number of actors
$query = "SELECT * FROM actor";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);

 // take the data from the form 
 $name =  $_REQUEST['actor_name'];
 $gender =  $_REQUEST['actor_gender'];
 $email = $_REQUEST['actor_email'];
 $id = $n+17;
 $admin_id = '1';


  
 // insert query
 $sql = "INSERT INTO actor  VALUES ('$name',
     '$email','$gender', '$id' ,'$admin_id')";
  
 if(mysqli_query($conn, $sql)){
   header('location: AdminNewActor.html'); //go back to the html page
   echo '<script> window.alert("The product was added successfuly")</script>';

 }
 
 else{
     echo "ERROR: $sql. "
         . mysqli_error($conn);
 }
  
 // Close connection
 mysqli_close($conn);
 ?>