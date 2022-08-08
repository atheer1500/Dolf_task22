<?php
session_start();
if (isset($_SESSION['userID']))
$userID = $_SESSION["userID"];
else
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
    <title>User Account</title>
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <style type="text/css">



td {
  text-align: left;
}



input[type=submit]:disabled
{
background-color: white;
border: none;
cursor: default;
color: #8497b5;
opacity: 0.2;
}



</style>
</head>
<body class="homePage admin">

<div class="sidenav">
  <a href="homepage.php"><i class="fa-solid fa-house fa-2xl"></i> <br><br>Home</a>
  <a href="UserProfile.php" class="focused"><i class="fa-solid fa-id-card fa-2xl"></i> <br><br> My Profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user fa-2xl"></i> <br><br> My Account </a>

  <a href="Mytickets.php"><i class="fa-solid fa-ticket fa-2xl"></i> <br><br> My Tickets</a>
  <hr>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl"> </i> <br><br> Logout</a>
</div>


<div class="main" style="margin-top: 10%">
<h2>User Profile</h2>

<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
   echo '<script> window.onload=function(){alert("Updated successfuly");}; </script>';}
   
   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
   echo '<script> window.onload=function(){alert("Failed to update!");}; </script>         ';
   }



echo '
<div style="text-align: center; ">
<div style="display: inline-block; text-align: right; " class ="formBackground">



<form class="myform" name ="adminForm" action="EditUserProfile.php" method="post">';

//Database connention
$conn = mysqli_connect("localhost", "id19368729_maisaaahmadali", "SAVCOrVt]}D4D-VZ", "id19368729_event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM `end_user` WHERE `UserEmail` = '$userID'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>        



<p>
<label for="firstName">First name:</label>
    <input type="text" name="first_name" id="firstName"
   value = "<?php echo $row[0] ?>" 
   >
</p>

<br>

<p>
<label for="lastName">Last name:</label>
    <input type="text" name="last_name" id="lastName"
   value = "<?php echo $row[1] ?>" 
   >
</p>

<br>

             



<p>
   
<label><i class="fa-solid fa-person-half-dress"></i> Gender:</label> 
<span style = "float: right">

    <input type="radio" id="f2" name="user_gender" value="F" <?php if ($row[4] == 'F') echo 'checked="checked"'; ?>>
<label for="f" style="float: none; margin-right: 25px;">Female</label>

<input type="radio" id="m" name="user_gender" value="M" <?php if ($row[4] == 'M') echo 'checked="checked"'; ?>>
<label for="m" style="float: none;">Male</label><br>
  </span>
</p>

<br>
<br>
<br>



<input type="submit" id="updateButton" value="Update" name="update_button" style="float:left;" class="submitbutton" onclick = "return(validateNew());"> 
      <input type="submit" id="cancelButton" value="Cancel" name = "cancel_button" style="float:right; width:30%;  " >
 
        

           
         </form></div></div>

<p> 

</div>

<script>
  //Form validation

  function validate() {
//1- Check if all information filled
  if (document.forms["adminForm"]["current_pass"].value == "") {
    alert("Please fill the password field.");
    //document.forms["newManagerForm"]["manager_name"].focus();
    return false;
  }
      }



      
  function validateNew() {
//1- Check if all information filled
  if (document.forms["adminForm"]["admin_newPass"].value == ""  || document.forms["adminForm"]["admin_newEmail"].value == "")   {
    alert("Please fill all the fields.");
    //document.forms["newManagerForm"]["manager_name"].focus();
    return false;

}

//2- Check the Email format
var email = document.forms["adminForm"]["admin_newEmail"].value;
var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;

if (!emailFormat.test(email)) {
   alert("Please enter valid email format. ");
   return false;
  }

  //3- Check password length
    if (document.forms["adminForm"]["admin_newPass"].value.length > 10){
      alert("Please enter a pasword less than 10 characters. ");
   return false;
    }
  


      }

      
  function showPass() {
  var passField = document.getElementById("Pass");
  //var eyeIcon = document.getElementById("eyeIcon");
  //var eyeSlash = document.getElementById("eyeSlash");

  if (passField.type === "password") {
    passField.type = "text";
    $( '#eyeIcon' ).show();
    $( '#eyeSlash' ).hide();

  } else {
    passField.type = "password";
    $( '#eyeIcon' ).hide();
    $( '#eyeSlash' ).show();
  }
}
</script>
</body>
</html>