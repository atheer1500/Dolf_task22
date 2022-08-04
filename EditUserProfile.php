
<?php
session_start();
$userID = $_SESSION["userID"];

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
  


  
    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
$firstName = $_REQUEST['first_name'];
$lastName = $_REQUEST['last_name'];
$gender = $_REQUEST['user_gender'];

 
 $updateQuery = "UPDATE `end_user` set `FirstName` = '$firstName', `LastName` = '$lastName', `Gender` = '$gender'";

      //action for update here
      if(mysqli_query($conn, $updateQuery))
        header('location: UserProfile.php?problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location:UserProfile.php?problem=UPDATEERROR');
        } 
  

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: HomePage.php');
  }


 ?>