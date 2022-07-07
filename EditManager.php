
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
  




 $ID = $_GET['id'];


$deleteQuery = "DELETE FROM actor WHERE `ActorID` = '$ID'";

  


    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
 $name =  $_REQUEST['actor_name'];
 $gender =  $_REQUEST['actor_gender'];
 $email = $_REQUEST['actor_email'];
 
 $updateQuery = "UPDATE actor set `Name` = '$name', `ActorEmail` = '$email', `Gender` = '$gender' WHERE `ActorID` = '$ID'";

      //action for update here
      if(mysqli_query($conn, $updateQuery))
        header('location: AdminEditActor.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location: AdminEditActor.php?problem=UPDATEERROR');
        } 
  

  else if (isset($_POST['delete_button'])) {
      //action for delete
      if(mysqli_query($conn, $deleteQuery)){
        header('location: AdminHome.php?problem=DELETED'); //go back to the EDIT page
      }
      
      else
         header('location: AdminEditActor.php?problem=DELETEERROR');
  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: AdminHome.php');
  }
 ?>