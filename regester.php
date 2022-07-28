<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Regeister</title>
    <style>
     #passwordF
     {
       margin-left: -1000px;
    }
        </style>
    <!-- <?php
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
    //  closeconn($conn);
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
    <style>
                  /* #passwordF
{
margin-left: -1000px;


} */
.buttonstyle, input[type=submit]
{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    border: 1px solid #8497b5;
    border-radius: 50px;
    padding: 10px;
    text-decoration: none;
    color: #8497b5;
    font-weight: bold;
    font-size: medium;
    background: none;
    text-align: center;
    margin: 10px;
    cursor: pointer;
}
    </style>
</head>
<body class="LoginRegisterPage">
    <div class="loginContainer">
        <h2> Regester </h2>
        <div class="loginBox">
            <form  id="Regester" action = "NewUserRegseter.php" method="POST">
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
            <input class="loginInputs" type="password" id="passwordF" name="password" placeholder="Password" ><br>
<br>
            <button  class="buttonstyle"style="width:230px ;height: 39px;" >Regester</button>
            </form>
            <a href="Login.php" class="newuser" style="  text-decoration: none;
  color: #063a62db;">alrady have an account? click hear!</a>
<br>
        </div>
      

    </div>
    
</body>
</html>