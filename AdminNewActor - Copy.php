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
<h2>Add the Actor information:</h2>

<br><br><br><br>

<form action="AdminNewActor.php" method="post">
             
<p>
               <label for="firstName">First Name:</label>
               <input type="text" name="first_name" id="firstName">
            </p>
 
             
<p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="last_name" id="lastName">
            </p>
 
             
<p>
               <label for="Gender">Gender:</label>
               <input type="text" name="gender" id="Gender">
            </p>
 
             
<p>
               <label for="Address">Address:</label>
               <input type="text" name="address" id="Address">
            </p>
 
             
<p>
               <label for="emailAddress">Email Address:</label>
               <input type="text" name="email" id="emailAddress">
            </p>
 
            <input type="submit" value="Add">
         </form>

<p> 
</div>





</body>
</html>