
<?php
 session_start();
 use PHPMailer\PHPMailer\PHPMailer;

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
  

 
 //Take image from the form 
 $imgCopy =  $_FILES['event_img'];
 //Move image to Images folder
 move_uploaded_file($imgCopy['tmp_name'],"images/".$imgCopy['name']);

//Take image path
 $img =   "images/".$imgCopy['name'];

//Take the data from the form 
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
   //1- Send email to actor

   //a- Get actor email
   $query = "SELECT `ActorEmail` FROM `actor` WHERE `ActorID` = '$actorID'";
   $result=mysqli_query($conn, $query);
   $row=mysqli_fetch_row($result);


   //b- Send email code
       $name = "MA Event";  // Name of your website or yours
       $to = $row[0];  // mail of reciever
       $subject = "You have been added as an actor!";
       $body = "Dear $actor You have been added as an actor for $title event. \nDate: $date. \nTime:  $time. \nWe are excited to see you there!";
       $from = "maevent.noreply@gmail.com";  // you mail
       $password = "vfiqtteeuynndgyj";  // your mail password

       // Ignore from here

       require_once "PHPMailer/PHPMailer.php";
       require_once "PHPMailer/SMTP.php";
       require_once "PHPMailer/Exception.php";
       $mail = new PHPMailer();

       // To Here

       //SMTP Settings
       $mail->isSMTP();
       // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
       $mail->Host = "smtp.gmail.com"; // smtp address of your email
       $mail->SMTPAuth = true;
       $mail->Username = $from;
       $mail->Password = $password;
       $mail->Port = 587;  // port
       $mail->SMTPSecure = "tls";  // tls or ssl
       $mail->smtpConnect([
       'ssl' => [
           'verify_peer' => false,
           'verify_peer_name' => false,
           'allow_self_signed' => true
           ]
       ]);

       //Email Settings
       $mail->isHTML(true);
       $mail->setFrom($from, $name);
       $mail->addAddress($to); // enter email address whom you want to send
       $mail->Subject = ("$subject");
       $mail->Body = $body;
       if ($mail->send()) {
           echo "Email is sent!";
       } else {
           echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
       }

       header('location: ManagerNewEvent.php?problem=ADD'); //2- Go back to the add page
  }

 }
 
 else
    header('location: ManagerNewEvent.php?problem=ADDERROR')





 ?>