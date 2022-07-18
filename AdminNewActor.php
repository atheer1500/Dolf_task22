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
    cursor: pointer;

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
<h2>Add New Actor</h2>
<h4>Enter the actor information:</h4>

<div style="text-align: center;">
<div style="display: inline-block; text-align: left;">

<form class ="myform" name ="newActorForm" action="InsertActor.php" method="post" onsubmit = "return(validate());">
<?php
if (isset ($_GET['problem']) and ($_GET['problem']=='ADD')) {
echo '<script> window.onload=function(){alert("The actor is added successfuly");}; </script>';}

else if (isset ($_GET['problem']) and ($_GET['problem']=='ADDERROR')){
echo '<script> window.onload=function(){alert("Failed to add the actor!");}; </script>         ';
}
?>             
<p>
    <label for="actorName">Actor Name:</label>
    <input type="text" name="actor_name" id="actorName">
</p>

  
  <br>

  
<p>
    <label for="actorEmail">Actor Email:</label>
    <input type="text" name="actor_email" id="actorEmail">
</p>


<br>
              
<p>
   
<label>Gender: </label>

    <input type="radio" id="f2" name="actor_gender" value="Female">
<label for="f" style="float: none;">Female</label>

<input type="radio" id="m" name="actor_gender" value="Male">
<label for="m" style="float: none;">Male</label>


</p>

<br>

           <div class="center"><input type="submit" value="Add" class="submitbutton"> </div>
         </form>
</div>
</div>




</div>


<script>
  //Form validation

  function validate() {
//1- Check if all information filled
  if (document.forms["newActorForm"]["actor_name"].value == "" || document.forms["newActorForm"]["actor_email"].value == "" || document.forms["newActorForm"]["actor_gender"].value == "") {
    alert("Please fill all the information. ");
    return false;
  }

//2- Check the Email format
var email = document.forms["newActorForm"]["actor_email"].value;
var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;

if (!emailFormat.test(email)) {
   alert("Please enter valid email format. ");
   return false;
  }


//Check and correct popular email domains
//   const example = "example@gmial.com"
// if (/@gm(ia|a|i)l.com$/.test(example)) {
//   alert("Maybe you meant @gmail.com?")
//   return false;
// }

      }
</script>


</body>
</html>