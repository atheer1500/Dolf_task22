<?php
session_start();
include('connection.php'); 
$conn=OpenCon();
$query="SELECT `Name` FROM  `event_manger` WHERE `MangerID`='" .$_SESSION['MangerID'] ."';";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Manager Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <style type="text/css">



td {
  text-align: left;
}





</style>
</head>
<body class="homePage admin">

<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerAccount.php"><i class="fa-solid fa-user"></i> My account </a>
  <a href="viewManger.php"><i class="fa-solid fa-calendar-check"></i> My events </a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main" style="margin-top: 10%">
<h2>Hello <?php echo  $row[0];?></h2>
<h4>What would you like to do today?</h4>
<div class="center">
<a class ="buttonstyle" href="#events"> View all Events </a> <a class ="buttonstyle" href="viewManger.php">Manage my Events </a>

</div>

<br><br><br><br>

<hr>

<h5 id="events"> List of events </h5>
<a class="buttonstyle" href="ManagerNewEvent.php">+ New</a>

<?php
   if (isset ($_GET['problem']) and ($_GET['problem']=='DELETED')){
        echo '<script> window.onload=function(){alert("Deleted successfuly!");}; </script>         ';
        }

        

$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query="SELECT * FROM `events`";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);
if ($n==0)
echo '<p>There are no events created yet</p>'; 

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;

        $id = $row[3]; //Current ID
        
        echo '<td> <img src="
        '
. $row[6] .

'"style="width:200px; height: 300px;"><br>' . $row[1] .


'<br>

<p> Date: '

. $row[3] .

'</p> <p> Time: '

. $row[2] .

       '</p> </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>


</div>





</body>
</html>