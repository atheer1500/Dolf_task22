<?php
session_start();
if (isset($_SESSION['userID']))
$userID = $_SESSION["userID"];
else
header('location:login.php');
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
  <a href="homepage.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-user"></i> My profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user"></i> My account </a>

  <a href=""><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main" style="margin-top: 10%">
<h2>User Account</h2>

<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
   echo '<script> window.onload=function(){alert("Updated successfuly");}; </script>';}
   
   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
   echo '<script> window.onload=function(){alert("Failed to update!");}; </script>         ';
   }



echo '
<div style="text-align: center; ">
<div style="display: inline-block; width: 25%;" class ="formBackground">

<form class="myform" name ="adminForm" action="EditManagerAccount.php" method="post">';

//Database connention
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM `end_user` WHERE `UserEmail` = '$userID'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>        



<p>
<label for="Email">User Email:</label>
    <input type="text" name="newEmail" id="Email"
   value = "<?php echo $row[3] ?>" disabled
   >
</p>


<br>

<p>
<label for="Pass" style="">User Password:</label>
    <input type="password" name="newPass" id="Pass" value = "<?php if (isset ($_GET['problem']) and ($_GET['problem']=='PASSCORRECT')) echo $row[2] ?>"
    disabled
   >
   <i class="fa-solid fa-eye-slash" style="cursor:pointer; display: none; position: relative; left: 70%;" id="eyeSlash" onclick="showPass()"></i>
   <i class="fa-solid fa-eye" style="cursor:pointer; display: none; position: relative; left: 70%;" id="eyeIcon" onclick="showPass()"></i>

</p>
<br>

<p> </p>

<!-- For authentication, enter current password first -->
<div id="authentication">
<p>
<strong><label for="currentPass">Enter your current password to update your account information.</label></strong><br><br><br>
    <input type="password" name="current_pass" id="currentPass" style="  float: none;" >

   
</p>
<?php
if (isset ($_GET['problem']) and ($_GET['problem']=='PASSERROR')) 
      echo "<p style='color:red;'>Incorrect password. Please try again. </p> ";
 ?>
<br>

<div class="center">
<input type="submit" value="Ok" name="OK_button" style="" class="submitbutton"  onclick = "return(validate());">
  </div>
  </div>

<?php 
if (isset ($_GET['problem']) and ($_GET['problem']=='PASSCORRECT')){

    // echo <strong> <p id="text1" style ="display: none;">Enter the account new information:</p> </strong>

      echo " <script>
      $( '#Email' ).prop('disabled', false);
      $( '#Pass' ).prop('disabled', false);
     
      $( '#eyeSlash' ).show();
      $( '#text1' ).show();

      $( '#authentication' ).hide();

        </script>";
      

      echo
      ' <div class="center">
      <br>
      <input type="submit" id="updateButton" value="Update" name="update_button" style="float:left;" class="submitbutton" onclick = "return(validateNew());"> 
      <input type="submit" id="cancelButton" value="Cancel" name = "cancel_button" style="float:right; width:30%;  " >
      <br><br><br>


   </div> ';}
                    ?>


 
        

           
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