
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


$deleteQuery = "DELETE FROM `event_manger` WHERE `MangerID` = '$ID'";

  


    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
 $name =  $_REQUEST['manager_name'];
 $email =  $_REQUEST['manager_email'];
 $password = $_REQUEST['manager_pass'];
 
 $updateQuery = "UPDATE `event_manger` set `Password` = '$password', `MangerEmail` = '$email', `Name` = '$name' WHERE `MangerID` = '$ID'";

      //action for update here
      if(mysqli_query($conn, $updateQuery))
        header('location: AdminEditManager.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location: AdminEditManager.php?problem=UPDATEERROR');
        } 
  

  else if (isset($_POST['delete_button'])) {
      //action for delete
      if(mysqli_query($conn, $deleteQuery)){
        header('location: AdminHome.php?problem=DELETED'); //go back to the EDIT page
      }
      
      else
         header('location: AdminEditManager.php?problem=DELETEERROR');
  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: AdminHome.php');
  }
 ?>