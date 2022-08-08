<?php
session_start();
if (!isset($_SESSION['AdminID']))
header('location:unauthorized.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <style type="text/css">



p {

        line-height: 0;
}



</style>
</head>
<body class="homePage admin">



<div class="sidenav">
<a href="AdminHome.php"  class="focused"><i class="fa-solid fa-house fa-2xl"></i><br><br> Home</a>
  <a href="AdminAccount.php"><i class="fa-solid fa-user fa-2xl"></i><br><br> My Account</a>

  <a href="AdminNewActor.php"><i class="fa-solid fa-circle-plus fa-2xl"></i><br><br> Add Actor</a>
  <a href="AdminNewManager.php"><i class="fa-solid fa-circle-plus fa-2xl"></i><br><br> Add Manager</a>
  <hr>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl"></i><br><br> Logout</a>
</div>



<div class="main" style="">
<header>
  <div class="left">
  <img src="logo.png" width= "150px">
</div >
</header>
<div style="">
<h2>Welcome back Admin</h2>
<h4>What would you like to do today?</h4>
<div class="center">
<a class ="buttonstyle2" href="#actors"> Manage Actors </a>
<a class ="buttonstyle2" href="#managers"> Manage Event Managers </a>
</div>

</div>

<br><br><br><br>

<hr>

<h5 id="actors"> List of Actors </h5>
<a class="buttonstyle" href="AdminNewActor.php" style="">+ New</a>

<?php
   if (isset ($_GET['problem']) and ($_GET['problem']=='DELETED')){
        echo '<script> window.onload=function(){alert("Deleted successfuly!");}; </script>         ';
        }

        

$conn = mysqli_connect("localhost", "id19368729_maisaaahmadali", "SAVCOrVt]}D4D-VZ", "id19368729_event");
if (!$conn)
die ("Could not connect to the database");

$query="SELECT * FROM actor";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);
if ($n==0)
echo '<p>You did not add any actors yet</p>'; 

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto; ">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;

        $id = $row[3]; //Current ID
        
        echo '<td>
        '
. $row[0] .

'<br> <p>Email: ' 
. $row[1] .
'</p> <p>Gender: '
. $row[2] .
'</p>
<br><a class="buttonstyle" href="AdminEditActor.php?id='
. $id .
'">Edit</a>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>

<hr> 

<h5 id="managers"> List of Event Managers </h5>
<a class="buttonstyle" href="AdminNewManager.php" style="">+ New</a>

<?php
$conn = mysqli_connect("localhost", "id19368729_maisaaahmadali", "SAVCOrVt]}D4D-VZ", "id19368729_event");
if (!$conn)
die ("Could not connect to the database");

$query="SELECT * FROM `event_manger`";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);
if ($n==0)
echo '<p>You did not add any event managers yet</p>'; 

echo '<table cellpadding="40" cellspacing="10"  style = "text-align: center; margin-left:auto; margin-right: auto;">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;
        
        $id = $row[3]; //Current ID

        echo '<td>
        '
. $row[2] .

'<br> <p>Email: ' 
. $row[1] .
//'<br> Gender: '
//. $row[2] .
'</p>
<br><a class="buttonstyle" href="AdminEditManager.php?id='
. $id .
'">Edit</a>
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