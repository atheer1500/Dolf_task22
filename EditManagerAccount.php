
<?php
session_start();
$managerID = $_SESSION["MangerID"];

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
$email = $_REQUEST['newEmail'];
$newPass = $_REQUEST['newPass'];

$conflictQuery = "SELECT * FROM `event_manger` WHERE `MangerEmail` = '$email' AND `event_manger`.`MangerID` != '$managerID'";
$conflictResult=mysqli_query($conn, $conflictQuery);
$conflictCount = mysqli_num_rows($conflictResult);
 $updateQuery = "UPDATE `event_manger` set `MangerEmail` = '$email', `Password` = '$newPass' WHERE `MangerID` = '$managerID'";

//Check if if email is taken.
if ($conflictCount > 0){
    header('location: ManagerAccount.php?id=' . $ID . '&problem=UPDATEERROR1');
}


      //action for update here
     else if(mysqli_query($conn, $updateQuery))
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