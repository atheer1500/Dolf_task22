
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
  

 // take the data from the form 
 $img =  $_REQUEST['event_img']; //Here we can change the path (add folder name for example)
 $title =  $_REQUEST['event_title'];
 $description = $_REQUEST['event_description'];
 $time = $_REQUEST['event_time'];
 $date = $_REQUEST['event_date'];
 $actor = $_REQUEST['event_actor'];
 $ticketsNum = $_REQUEST['event_tickets'];



echo $title;
echo "<br>";

echo $time ;
echo "<br>";

echo $date;
echo "<br>";

echo $description ;
echo "<br>";


echo $ticketsNum;
echo "<br>";

echo $img ;
echo "<br>";


echo $actor ;
echo "<br>";



 //GET THE ACTOR ID
 $query = "SELECT `ActorID` FROM `actor` WHERE `Name` = '$actor'";
 $result=mysqli_query($conn, $query);
 $row=mysqli_fetch_row($result);
 
 $actorID = $row[0];
 echo $actorID ;

 //Insert query
 $sql = 'INSERT INTO `events`(`Title`, `Time`, `Date`, `Description`, `AvailableTickets__`, `Pic`, `ActorID`) 
                      VALUES ("' . $title . '", "' . $time . '" ,"' . $date . '", "' . $description . '", "' . $ticketsNum . '", "' . $img . '", "' . $actorID . '")';
  
 if(mysqli_query($conn, $sql)){
   header('location: ManagerNewEvent.php?problem=ADD'); //Insert to the database, then go back to the add page

 }
 
 else
    header('location: ManagerNewEvent.php?problem=ADDERROR')
 

 ?>