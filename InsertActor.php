
<?php
 
 // servername => localhost
 // username => root
 // password => empty
 // database name => event
 $conn = mysqli_connect("localhost", "id19368729_maisaaahmadali", "SAVCOrVt]}D4D-VZ", "id19368729_event");
  
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. "
         . mysqli_connect_error());
 }
  
//Get number of actors 
//$query = "SELECT * FROM actor";
//$result = mysqli_query($conn, $query);
//$n = mysqli_num_rows($result);

 // take the data from the form 
 $name =  $_REQUEST['actor_name'];
 $gender =  $_REQUEST['actor_gender'];
 $email = $_REQUEST['actor_email'];

 //TO GET THE ADMIN ID
 $query = "SELECT * FROM `admin`";
 $result=mysqli_query($conn, $query);
 $row=mysqli_fetch_row($result);
 
 $admin_id = $row[2];


  
 // insert query
 $sql = "INSERT INTO actor (`Name`, `ActorEmail`, `Gender`, `AdminID`) VALUES ('$name',
     '$email','$gender' ,'$admin_id')";
     
  

  //Check if if email is taken for another manager.

$conflictQuery = "SELECT * FROM `actor` WHERE `ActorEmail` = '$email' OR `Name` = '$name'";
$conflictResult=mysqli_query($conn, $conflictQuery);
$conflictCount = mysqli_num_rows($conflictResult);
$insertResult=mysqli_query($conn, $sql);

 if ($conflictCount > 0){
    header('location: AdminNewActor.php?problem=ADDERROR1');
 }


 else if($insertResult){
   header('location: AdminNewActor.php?problem=ADD'); //go back to the add page

 }
 
 else

      // printf("Error: %s\n", mysqli_error($conn));
   header('location: AdminNewActor.php?problem=ADDERROR')
 
 
   

 ?>