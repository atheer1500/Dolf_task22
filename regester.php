<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Regeister</title>
    <!-- <?php
     include('connection.php');
     $conn=OpenCon();
    //  function  checkinfo()
    //  {

    //  $Id=$_POST['Email'];
    //  $pass=$_POST['password'];
    //  $sql ="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$Id."' AND `Password`=".$pass."";
    //  $conn=OpenCon();
    //  $result=mysqli_query($conn,$sql);
    //  if (mysqli_num_rows($result) == 1)
    //   {
    //      $row = mysqli_fetch_assoc($result);
    //       echo "Logged in!";
    //   }
    // }
     closeconn($conn);
    ?> -->
    <script>

        function validate()
        {
            // var Email=document.getElementById("Email");
            // var Password=document.getElementById("password");
            // if(!(isset(Email)||isset(Password))||isEmpty(Email)||isEmpty(Password))
            // {
            //     window.alert("somthing is missing");
            // }
            // else
            // {
            //     var form=document.getElementById("login");
            //     form.setAttribute.
            // }
        }

    </script>
</head>
<body class="LoginRegisterPage">
    <div class="loginContainer">
        <h2> Consorts  </h2>
        <div class="loginBox">
            <form  id="Regester" action = "reg.php" method="POST">
            <br>
            <input type="text" class="loginInputs" id="Fname" name="Fname" placeholder="Enter First Name">
            <br><br>
            <input type="text" class="loginInputs" id="Lname" name="Lname" placeholder="Enter Last Name">
            <br><br>
           
            <input type="radio" id="F" name="Gender" value="F">
            <label for="F">Female</label>
            <input type="radio" id="M" name="Gender" value="M">
            <label for="M">male</label>
            <br>
            <br>
            <input  class="loginInputs" type="text" id="Email" name="Email" placeholder="ُE-maill address"><br><br>
            <input class="loginInputs" type="password" id="password" name="password" placeholder="Password"><br>

            <button  style="width:230px ;height: 39px;" onclick="" >Regester</button>
            </form>
            <a href="Login.php" class="newuser" style="  text-decoration: none;
  color: #063a62db;">alrady have an account? click hear!</a>
<br>
        </div>

    </div>
    
</body>
</html>