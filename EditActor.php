
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
  




 $ID = $_GET['id'];







  


    if (isset($_POST['update_button'])) {
      
 // take the data from the form 
 $name =  $_REQUEST['actor_name'];
 $gender =  $_REQUEST['actor_gender'];
 $email = $_REQUEST['actor_email'];
 
 $updateQuery = "UPDATE actor set `Name` = '$name', `ActorEmail` = '$email', `Gender` = '$gender' WHERE `ActorID` = '$ID'";

      //Check if if email is taken for another ACTOR.

      $conflictQuery = "SELECT * FROM `actor` WHERE `ActorEmail` = '$email' OR `Name` = '$name' AND `ActorID` != '$ID'";
      $conflictResult=mysqli_query($conn, $conflictQuery);
      $conflictCount = mysqli_num_rows($conflictResult);

      if ($conflictCount > 0){
          header('location: AdminEditActor.php?id=' . $ID . '&problem=UPDATEERROR1');
      }

      //action for update here
      else if(mysqli_query($conn, $updateQuery))
        header('location: AdminEditActor.php?id=' . $ID . '&problem=UPDATED'); //go back to the EDIT page
      
      
      else
         header('location: AdminEditActor.php?problem=UPDATEERROR');
        } 
  

  else if (isset($_POST['delete_button'])) {
      //Actions for delete

      //First, delete Actor events from `edit_events` table.
      $selectQuery = "SELECT `EventID` FROM  `events` WHERE `ActorID` = '$ID'";
      $selectQueryResult = mysqli_query($conn, $selectQuery);

      while ($row=mysqli_fetch_row($selectQueryResult)){
        $deleteEventsQuery2 = "DELETE FROM  `edit_event` WHERE `EventID` = '$row[0]'";
        mysqli_query($conn, $deleteEventsQuery2);
      }

      //Second, delete Actor events from `events` table.

        //Delete actor SQL
        $deleteQuery = "DELETE FROM actor WHERE `ActorID` = '$ID'";
        //Delete actor events SQL
        $deleteEventsQuery = "DELETE FROM `events` WHERE `ActorID` = '$ID'";

      if(mysqli_query($conn, $deleteEventsQuery)){
        //Now, delete the actor 
        if (mysqli_query($conn, $deleteQuery))
        header('location: AdminHome.php?problem=DELETED'); //go back to the EDIT page
        else
        header('location: AdminEditActor.php?problem=DELETEERROR');
      }
      
      else
         header('location: AdminEditActor.php?problem=DELETEERROR');



  } 

  else if (isset($_POST['cancel_button'])) {
      //cancel
      header('location: AdminHome.php');
  }


 ?>