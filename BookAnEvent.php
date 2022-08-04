<?php
session_start();
if (!isset($_SESSION["userID"]))
header('location:unauthorized.php');
?>
<?php
//session_start();
include('connection.php'); 
$conn=OpenCon();
$evID= $_GET['evID'];

$SqlFindEvent="SELECT `PaymentMethod` FROM `book` WHERE `UserEmail`='".$_SESSION["userID"]."' AND `EventID`='".$evID."'";
if($ResultSqlFindEvent=mysqli_query($conn,$SqlFindEvent))
{
  
}
else
{

if (isset($_POST['Tickets'])&&isset($_POST['Payment'])) 
{
// session_start();
// include('connection.php'); 
// $conn=OpenCon();
// $evID= $_GET['evID'];

$SqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`)
VALUES ('".$_POST['Payment']."','".$_POST['Tickets']."','".$_SESSION["userID"]."','".$evID."');";

$SqlUpdateEvent="UPDATE `events` SET `AvailableTickets__`='".($_SESSION['AvailableTickets__']-$_POST['Tickets'])."' WHERE `EventID`='".$_SESSION['EventID']."';";
if ($ResultSqlInsertToBook= mysqli_query($conn, $SqlInsertToBook)&&$ResultSqlUpdateEvent= mysqli_query($conn, $SqlUpdateEvent))  
{
    echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://kit.fontawesome.com/191f749b6c.js' crossorigin='anonymous'></script>
     <link rel='stylesheet' href='CSS/Maincss.css' media='all' type='text/css'>
     <link rel='stylesheet' href='CSS/user.css' media='all' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>View conserts</title>
    <script>
      // function Logout()
      // {
      //    <?php
      //    include_once('Logout.php');
      //    ?>
      // }
      </script>
    
</head>
<body >
   
<div class='sidenav'>
  <a href='homepage.php'><i class='fa-solid fa-house fa-2xl'></i> <br><br>Home</a>
  <a href='UserProfile.php'><i class='fa-solid fa-id-card fa-2xl'></i> <br><br> My Profile </a>

  <a href='UserAccount.php'><i class='fa-solid fa-user fa-2xl'></i> <br><br> My Account </a>

  <a href='Mytickets.php'><i class='fa-solid fa-ticket fa-2xl'></i> <br><br> My Tickets</a>
  <hr>

  <a href='logout.php'><i class='fa-solid fa-right-from-bracket fa-2xl'> </i> <br><br> Logout</a>
</div>

<h2 style='margin-left:10%;margin-top:10%;'> 
 Booked Successfully<br>
 to view your booking <a style ='  text-align: center;
 color: #1c2841;'href='Mytickets.php?evID=".$evID."'>click hear</a></h2>

";
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}
else if (!isset($_POST['Payment']))
{
  echo "
  <script type='text/javascript'>
       window.onload = 
       function ()
        {  
          if (confirm('You have not chose a payment method') == true) 
          {
            window.open('Book.php', '_blank');
          } 
        
          
          
        } 
  </script>"; 
}
}

