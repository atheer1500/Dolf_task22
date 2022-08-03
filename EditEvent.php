
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

 //Take image from the form 
 $imgCopy =  $_FILES['event_img'];
 //Move image to Images folder
 move_uploaded_file($imgCopy['tmp_name'],"images/".$imgCopy['name']);

//Take image path
 $img =   "images/".$imgCopy['name'];

//Take the data from the form 
 $title =  $_REQUEST['event_title'];
 $description = $_REQUEST['event_description'];
//  $time = $_REQUEST['event_time'];
//  $date = $_REQUEST['event_date'];
//  $actor = $_REQUEST['event_actor'];
 $ticketsNum = $_REQUEST['event_tickets'];




//  //GET THE ACTOR ID
//  $query = "SELECT `ActorID` FROM `actor` WHERE `Name` = '$actor'";
//  $result=mysqli_query($conn, $query);
//  $row=mysqli_fetch_row($result);
 
//  $actorID = $row[0];


  //get event id
  $eventID = $_GET['id'];

 



    if (isset($_POST['update_button'])) {
        //If the image didn't change, keep the old image
        $query = "SELECT `Pic` FROM `events` WHERE `EventID` = '$eventID'";
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_row($result);
        if ($img == "images/")
        {
            $img = $row[0];
        }

        //Update qeury
        $updateQuery = "UPDATE `events` set 
        `Title` = '$title', 
        -- `Time` = '$time', 
        -- `Date` = '$date',
        `Description` = '$description',
        `AvailableTickets__` = '$ticketsNum',
        `Pic` = '$img'
        -- ,`ActorID` = '$actorID'
         WHERE `EventID` = '$eventID'";


        //Action for update here

        //Check if event conflict with other events date & time
        $conflictQuery = "SELECT * FROM `events` WHERE `Time` = '$time' AND `Date` = '$date' AND `EventID` != '$eventID'";
        $conflictResult=mysqli_query($conn, $conflictQuery);
        $conflictCount = mysqli_num_rows($conflictResult);
        if ($conflictCount > 0){
            header('location: ManagerEditEvent.php?id=' . $eventID . '&problem=UPDATEERROR1');
        }

        else if(mysqli_query($conn, $updateQuery))
        header('location: ManagerEditEvent.php?id=' . $eventID . '&problem=UPDATED'); //go back to the EDIT page


        else
        header('location: ManagerEditEvent.php?id=' . $eventID . '&problem=UPDATEERROR');

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