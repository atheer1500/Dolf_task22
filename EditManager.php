
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







    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
 $name =  $_REQUEST['manager_name'];
 $email =  $_REQUEST['manager_email'];
 $password = $_REQUEST['manager_pass'];
 
 $updateQuery = "UPDATE `event_manger` set `Password` = '$password', `MangerEmail` = '$email', `Name` = '$name' WHERE `MangerID` = '$ID'";

      //Check if if email is taken for another manager.

      $conflictQuery = "SELECT * FROM `event_manger` WHERE `MangerEmail` = '$email' AND `MangerID` != '$ID'";
      $conflictResult=mysqli_query($conn, $conflictQuery);
      $conflictCount = mysqli_num_rows($conflictResult);

      if ($conflictCount > 0){
          header('location: AdminEditManager.php?id=' . $ID . '&problem=UPDATEERROR1');
      }

      //action for update here
      else if(mysqli_query($conn, $updateQuery))
        header('location: AdminEditManager.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location: AdminEditManager.php?problem=UPDATEERROR');
        } 
  

  else if (isset($_POST['delete_button'])) {
      //Actions for delete

      //First, delete events creeated by this manager.

        $selectQuery = "SELECT `EventID` FROM `edit_event` WHERE `MangerID` = '$ID'";
        $selectQueryResult = mysqli_query($conn, $selectQuery);

        while ($row=mysqli_fetch_row($selectQueryResult)){

          //1- Delete from `edit_event` table.
          $deleteEventsQuery1 = "DELETE FROM `edit_event` WHERE `EventID` = '$row[0]'";
          mysqli_query($conn, $deleteEventsQuery1);

          //2- Delete from `events` table.
          $deleteEventsQuery2 = "DELETE FROM  `events` WHERE `EventID` = '$row[0]'";
          mysqli_query($conn, $deleteEventsQuery2);
        }

      //Second, delete manager.
      $deleteQuery = "DELETE FROM `event_manger` WHERE `MangerID` = '$ID'";

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