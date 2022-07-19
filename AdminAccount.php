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

input[type=submit]:disabled
{
background-color: white;
border: none;
cursor: default;
color: #8497b5;
opacity: 0.2;
}


/*form style*/
.myform input[type=text], input[type=password] {
  border: none;
  border-radius: 4px;
  float: right;
}

.myform input[type=submit] {
  float: center;
}

.myform label {
  border-radius: 4px;
  float: left;
  padding-right: 10px;
}


.myform .submitbutton {
   width:30%; 
   background-color:white; 
   color: #8497b5;
}

</style>
</head>
<body class="homePage admin">

<script>
      function Logout()
      {
         <?php
         include_once("Logout.php");
         ?>
      }
      </script>
<div class="sidenav">
<a href="AdminHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="AdminAccount.php"><i class="fa-solid fa-user"></i> My Account</a>

  <a href="AdminNewActor.php"><i class="fa-solid fa-circle-plus"></i> Add Actor</a>
  <a href="AdminNewManager.php"><i class="fa-solid fa-circle-plus"></i> Add Manager</a>
  <a href="index.html" onclick="Logout()"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>


<div class="main" style="margin-top: 10%">
<h2>Edit Event Manager</h2>
<h4>Enter the manager new information:</h4>

<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
   echo '<script> window.onload=function(){alert("Updated successfuly");}; </script>';}
   
   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
   echo '<script> window.onload=function(){alert("Failed to update!");}; </script>         ';
   }



echo '
<div style="text-align: center;">
<div style="display: inline-block; text-align: left;">

<form class="myform" name ="adminForm" action="EditAdmin.php" method="post">';

//Database connention
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM `admin`";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>        



<p>
<label for="adminEmail">Admin Email:</label>
    <input type="text" name="admin_newEmail" id="adminEmail"
   value = "<?php echo $row[0] ?>" disabled
   >
</p>


<br>

<p>
<label for="adminPass" style="">Admin Password:</label>
    <input type="password" name="admin_newPass" id="adminPass" value = "<?php if (isset ($_GET['problem']) and ($_GET['problem']=='PASSCORRECT')) echo $row[1] ?>"
    disabled
   >
</p>
<br>

<p> </p>

<!-- For authentication, enter current password first -->
<div id="authentication">
<p>
<label for="currentPass">Enter your current password to update your email or password.</label><br><br>
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
      echo " <script>
      $( '#adminEmail' ).prop('disabled', false);
      $( '#adminPass' ).prop('disabled', false);
     
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
</script>
</body>
</html>