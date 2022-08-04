
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
$email = $_REQUEST['newEmail'];
$newPass = $_REQUEST['newPass'];

      

       $conflictQuery = "SELECT * FROM `end_user` WHERE `UserEmail` = '$email' AND `end_user`.`UserEmail` != '$userID'";
       $conflictResult=mysqli_query($conn, $conflictQuery);
       $conflictCount = mysqli_num_rows($conflictResult);
       $updateQuery = "UPDATE `end_user` set `UserEmail` = '$email', `Password` = '$newPass' WHERE `end_user`.`UserEmail` = '$userID'";
 
       //Check if if email is taken.
       if ($conflictCount > 0){
           header('location: UserAccount.php?id=' . $ID . '&problem=UPDATEERROR1');
       }
 

      //action for update here
     else if(mysqli_query($conn, $updateQuery)){
        //update session value 
        $_SESSION["userID"] = $email;
        
         header('location: UserAccount.php?problem=UPDATED'); //go back to the EDIT page
      }
       
      
      
      else
         header('location:UserAccount.php?problem=UPDATEERROR');
        } 
  
//if ok button
  else if (isset($_POST['OK_button'])) {

    $pass =  $_REQUEST['current_pass'];
    $query = "SELECT * FROM `end_user` WHERE `UserEmail` = '$userID'" ;
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_row($result);

//Action if the password is correct
    if ($pass == $row[2])
        header('location: UserAccount.php?problem=PASSCORRECT'); //go back to the page

      else
         header('location: UserAccount.php?problem=PASSERROR');



  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: HomePage.php');
  }


 ?>