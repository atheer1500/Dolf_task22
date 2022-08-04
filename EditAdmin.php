
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
  


  
    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
$email = $_REQUEST['admin_newEmail'];
$newPass = $_REQUEST['admin_newPass'];

 
 $updateQuery = "UPDATE `admin` set `AdminEmail` = '$email', `Passowrd` = '$newPass'";

      //action for update here
      if(mysqli_query($conn, $updateQuery))
        header('location: AdminAccount.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location: AdminAccount.php?problem=UPDATEERROR');
        } 
  
//if ok button
  else if (isset($_POST['OK_button'])) {

    $pass =  $_REQUEST['current_pass'];
    $query = "SELECT * FROM `admin`";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_row($result);

//Action if the password is correct
    if ($pass == $row[1])
        header('location: AdminAccount.php?problem=PASSCORRECT'); //go back to the page

      else
         header('location: AdminAccount.php?problem=PASSERROR');



  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: AdminHome.php');
  }


 ?>