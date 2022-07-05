<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css">
    <style type="text/css">



td {
  text-align: left;
}


</style>
</head>
<body class="homePage admin">

<div class="sidenav">
  <a href="#services"><i class="fa-solid fa-house"></i> Home</a>
  <a href="#clients"><i class="fa-solid fa-circle-plus"></i> Add Actor</a>
  <a href="#clients"><i class="fa-solid fa-circle-plus"></i> Add Manager</a>
  <a href="#contact"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main" style="margin-top: 10%">
<h2>Welcome back admin</h2>
<h4>What would you like to do today?</h4>
<div class="center">
<a class ="buttonstyle" href="#actors"> Manage Actors </a>
<a class ="buttonstyle" href="#managers"> Manage Event Managers </a>
</div>

<br><br><br><br>

<hr>

<h5 id="actors"> List of actors </h5>
<button>+ New</button>
<?php
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query="SELECT * FROM actor";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);
if ($n==0)
echo '<p>You did not add any actors yet</p>'; 

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;
        
        echo '<td>
        Name: '
. $row[0] .

'<br> Email: ' 
. $row[1] .
'<br> Gender: '
. $row[2] .
'<br><button>Edit</button>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>

<hr> 

<h5 id="managers"> List of event Managers </h5>
<button>+ New</button>
<?php
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query="SELECT * FROM `event_manger`";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);
if ($n==0)
echo '<p>You did not add any event managers yet</p>'; 

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;
        
        echo '<td>
        Name: '
. $row[2] .

'<br> Email: ' 
. $row[1] .
//'<br> Gender: '
//. $row[2] .
'<br><button>Edit</button>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>
<p> 
</div>





</body>
</html>