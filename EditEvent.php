
<?php
 session_start();

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
  
 $eventID=$_SESSION['EventID'];

 // take the data from the database 
 $img =  $_REQUEST['event_img']; //Here we can change the path (add folder name for example)
 $title =  $_REQUEST['event_title'];
 $description = $_REQUEST['event_description'];
 $time = $_REQUEST['event_time'];
 $date = $_REQUEST['event_date'];
 $actor = $_REQUEST['event_actor'];
 $ticketsNum = $_REQUEST['event_tickets'];





 //GET THE ACTOR ID
 $query = "SELECT `ActorID` FROM `actor` WHERE `Name` = '$actor'";
 $result=mysqli_query($conn, $query);
 $row=mysqli_fetch_row($result);
 
 $actorID = $row[0];


  //get event id
  $eventID =  $_SESSION['EventID'];

 



    if (isset($_POST['update_button'])) {
        //If the image didn't change, keep the old image
        $query = "SELECT `Pic` FROM `events` WHERE `EventID` = '$eventID'";
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_row($result);
        if ($img == "")
        {
            $img = $row[0];
        }
        
        //Update qeury
        $updateQuery = "UPDATE `events` set 
        `Title` = '$title', 
        `Time` = '$time', 
        `Date` = '$date',
        `Description` = '$description',
        `AvailableTickets__` = '$ticketsNum',
        `Pic` = '$img',
        `ActorID` = '$actorID'
         WHERE `EventID` = '$eventID'";


        //action for update here
        if(mysqli_query($conn, $updateQuery))
        header('location: ManagerEditEvent.php?id=' . $eventID . '&problem=UPDATED'); //go back to the EDIT page


        else
        header('location: ManagerEditEvent.php?problem=UPDATEERROR');

    }

    else if (isset($_POST['delete_button'])) {
        $deleteQuery1 = "DELETE FROM  `events` WHERE `EventID` = '$eventID'";
        $deleteQuery2 = "DELETE FROM  `edit_event` WHERE `EventID` = '$eventID'";


         //First, delete from edit_events table
      if(mysqli_query($conn, $deleteQuery2)){
        //Now, delete from events table
        if (mysqli_query($conn, $deleteQuery1))
        header('location: viewManger.php?problem=DELETED'); //go back to the EDIT page
        else
        header('location:ManagerEditEvent.php?problem=DELETEERROR');

    }

    else
    header('location: ManagerEditEvent.php?problem=DELETEERROR');



} 
 ?>