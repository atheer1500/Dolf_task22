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



td {
  text-align: left;
}



</style>
</head>
<body class="homePage admin">


<div class="sidenav">
<a href="AdminHome.php"><i class="fa-solid fa-house fa-2xl"></i><br><br> Home</a>
  <a href="AdminAccount.php"><i class="fa-solid fa-user fa-2xl"></i><br><br> My Account</a>

  <a href="AdminNewActor.php"><i class="fa-solid fa-circle-plus fa-2xl"></i><br><br> Add Actor</a>
  <a href="AdminNewManager.php"><i class="fa-solid fa-circle-plus fa-2xl"></i><br><br> Add Manager</a>
  <hr>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-2xl"></i><br><br> Logout</a>
</div>


<div class="main" style="margin-top: 10%">
<h2>Edit Event Manager</h2>

<?php
//Show success/fail meesages
if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATED')) {
   echo '<script> window.onload=function(){alert("The manager is updated successfuly");}; </script>';}
   
   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR')){
   echo '<script> window.onload=function(){alert("Failed to update the manager!");}; </script>         ';
   }


   else if (isset ($_GET['problem']) and ($_GET['problem']=='UPDATEERROR1')){
    echo '<script> window.onload=function(){alert("Failed: The event manager email is taken!");}; </script>         ';
    }

   else if (isset ($_GET['problem']) and ($_GET['problem']=='DELETEERROR')){
      echo '<script> window.onload=function(){alert("Failed to delete the manager!");}; </script>         ';
      }



//if (isset ($_GET['id']))
$managerID = $_GET['id']; 

echo '
<div style="text-align: center;">
<div class= "formBackground">

<form class="myform" name ="newManagerForm" action="EditManager.php?id=' . $managerID . '" method="post">';

//Database connention
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query = "SELECT * FROM `event_manger` WHERE `MangerID` = '" . $managerID . "'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
?>        


<p>
<label for="managerName">Manager Name:</label>
    <input type="text" name="manager_name" id="managerName"
   value = "<?php echo $row[2] ?>"
   >
</p>


<br>

<p>
<label for="managerEmail">Manager Email:</label>
    <input type="text" name="manager_email" id="managerEmail"
   value = "<?php echo $row[1] ?>"
   >
</p>


<br>

<p>
<label for="managerPass">Manager Password:</label>
    <input type="text" name="manager_pass" id="managerPass"
   value = "<?php echo $row[0] ?>"
   >
</p>

<br><br>

 
         <div class="center">
            <input type="submit" value="Save" name="update_button" style="float:left;" class="submitbutton" onclick = "return(validate());"> 
            <input type="submit" value="Cancel" name = "cancel_button" style="float:right; width:30%;  ">
            <br><br>
           <input type="submit" value="Delete Manager" name = "delete_button"style="background-color: red; border:none; color: white; width:90%;" onclick = "return confirm('Are you sure you want to delete?')">


         </div> 

           
         </form></div></div>

<p> 

</div>

<script>
  //Form validation

  function validate() {
//1- Check if all information filled
  if (document.forms["newManagerForm"]["manager_name"].value == "" || document.forms["newManagerForm"]["manager_email"].value == "" || document.forms["newManagerForm"]["manager_pass"].value == "") {
    alert("Please fill all the information. ");
    //document.forms["newManagerForm"]["manager_name"].focus();
    return false;
  }

//2- Check the Email format
var email = document.forms["newManagerForm"]["manager_email"].value;
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