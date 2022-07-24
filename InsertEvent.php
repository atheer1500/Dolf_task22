
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
  

 // take the data from the form 
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


 //Insert query
 $sql = 'INSERT INTO `events`(`Title`, `Time`, `Date`, `Description`, `AvailableTickets__`, `Pic`, `ActorID`) 
                      VALUES ("' . $title . '", "' . $time . '" ,"' . $date . '", "' . $description . '", "' . $ticketsNum . '", "' . $img . '", "' . $actorID . '")';
  



//Check if event conflict with other events date & time

$conflictQuery = "SELECT * FROM `events` WHERE `Time` = '$time' AND `Date` = '$date'";
$conflictResult=mysqli_query($conn, $conflictQuery);
$conflictCount = mysqli_num_rows($conflictResult);

 if ($conflictCount > 0){
    header('location: ManagerNewEvent.php?problem=ADDERROR1');
 }

  else if(mysqli_query($conn, $sql)){

  //1- get manager id from session
  $managerID = $_SESSION["MangerID"];

  //2-get event id
  $eventID = mysqli_insert_id($conn);
  
  //Now insert in edit_events table, this to identify which manager has created the event
  $sql2 = "INSERT INTO `edit_event`(`MangerID`, `EventID`) 
                      VALUES ('$managerID ', '$eventID')";
  if(mysqli_query($conn, $sql2)){
//    // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// mail("someone@example.com","My subject",$msg);
   header('location: ManagerNewEvent.php?problem=ADD'); //Insert to the database, then go back to the add page
  }

 }
 
 else
    header('location: ManagerNewEvent.php?problem=ADDERROR')





 ?>