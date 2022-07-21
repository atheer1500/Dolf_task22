
<?php
session_start();
$managerID = $_SESSION["MangerID"];

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
  


  
    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
$email = $_REQUEST['newEmail'];
$newPass = $_REQUEST['newPass'];

 
 $updateQuery = "UPDATE `event_manger` set `MangerEmail` = '$email', `Password` = '$newPass'";

      //action for update here
      if(mysqli_query($conn, $updateQuery))
        header('location: ManagerAccount.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location:ManagerAccount.php?problem=UPDATEERROR');
        } 
  
//if ok button
  else if (isset($_POST['OK_button'])) {

    $pass =  $_REQUEST['current_pass'];
    $query = "SELECT * FROM `event_manger` WHERE `MangerID` = '$managerID'" ;
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_row($result);

//Action if the password is correct
    if ($pass == $row[0])
        header('location: ManagerAccount.php?problem=PASSCORRECT'); //go back to the page

      else
         header('location: ManagerAccount.php?problem=PASSERROR');



  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: ManagerHome.php');
  }


 ?>