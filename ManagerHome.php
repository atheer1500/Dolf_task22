<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Manager Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css">
    <style type="text/css">



td {
  text-align: left;
}





</style>
</head>
<body class="homePage admin">

<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="viewManger.php"><i class="fa-solid fa-circle-plus"></i> My events </a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main" style="margin-top: 10%">
<h2>Hello (name of manager)</h2>
<h4>What would you like to do today?</h4>
<div class="center">
<a class ="buttonstyle" href="#events"> Manage Events </a>
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

$query="SELECT * FROM event";
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
        
        echo '<td>
        Name: '
. $row[0] .

'<br> Email: ' 
. $row[1] .
'<br> Gender: '
. $row[2] .
'<br><a class="buttonstyle" href="AdminEditActor.php?id='
. $id .
'">Edit</a>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>


</div>





</body>
</html>