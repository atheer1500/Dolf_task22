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

button, .buttonstyle, input[type=submit]
{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 1px solid white;
    border-radius: 50px;
    padding: 10px;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: medium;
    background: none;
    text-align: center;
    margin: 10px;
}

</style>
</head>
<body class="homePage admin">

<div class="sidenav">
    <a href="AdminHome.php"><i class="fa-solid fa-house"></i> Home</a>
    <a href="AdminNewActor.php"><i class="fa-solid fa-circle-plus"></i> Add Actor</a>
  <a href="AdminNewManager.php"><i class="fa-solid fa-circle-plus"></i> Add Manager</a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main" style="margin-top: 10%">
<h2>Add New Event Manager</h2>
<h4>Enter the manager information:</h4>

<form action="InsertManager.php" method="post">
<?php
if (isset ($_GET['problem']) and ($_GET['problem']=='ADD')) {
echo '<script> window.onload=function(){alert("The manager is added successfuly");}; </script>';}

else if (isset ($_GET['problem']) and ($_GET['problem']=='ADDERROR')){
echo '<script> window.onload=function(){alert("Failed to add the manager!");}; </script>         ';
}
?>                    
<p>
    <label for="managerName">Manager Name:</label>
    <input type="text" name="manager_name" id="managerName">
</p>

             
             
<p>
    <label for="managerEmail">Manager Email:</label>
    <input type="text" name="manager_email" id="managerEmail">
</p>


<p>
    <label for="managerPass">Manager Password:</label>
    <input type="text" name="manager_pass" id="managerPass">
</p>
 
           <div class="center"><input type="submit" value="Add"> </div>
         </form>

<p> 
</div>





</body>
</html>