<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <!-- <?php
     include('connection.php');
     $conn=OpenCon();

     closeconn($conn);
    ?> -->
    <script>
        // const form=document.getElementById("login");
        // form.addEventListener("submit",validate());
function validate()
{
   // var email=document.getElementById("Email");
    let Email=document.forms["myform"]["Email"].value;
    let password=document.forms["myform"]["password"].value;
    let User=document.forms["myform"]["UserEmail"].value;
    var error=document.getElementById("ErrorMessege");
    //&&(User.checked==false)
    //(typeof Email === 'string' && Email.length === 0)&&(typeof password === 'string' && password.length === 0)&&
    if ((User==false))
   {
    error.style.display="block";
    error.innerHTML="Pleas dont leave any empty field  !!"
    return false;
   }

}
    </script>
    <style>
#ErrorMessege
{
    display: none;
    color: red;
    background-color: white;
    border-radius: 4px;
    min-height: 20px;
    max-height: 100px;
    width: 270px;
    padding: 8px;
    margin-left: 200px;
}
 #passwordF
{
    margin-left:225px;
    border-style: solid;
    border-width: 2px;

}
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
.p
{
    border: none;
    border-radius: 4px;
}

    </style>

</head>
<body class="LoginRegisterPage">
    <div class="loginContainer">
        <h2> Login  </h2>
        <div id ="ErrorMessege"> </div>
        <div class="loginBox">
            <form  name="myform" id="login" action = "authentication.php" onsubmit="return  validate()" method="POST">
            <br>
            <input  class="loginInputs" type="text" id="Email" name="Email" placeholder="ُE-maill address"><br><br>
            <input class="loginInputs p" type="password" id="passwordF" name="password" placeholder="Password" style="margin-right: 230px;"><br><br>
            <input type="radio" id="UserEmail" name="User" value="UserEmail">     
            <label for="UserEmail">User</label><br>

            <input type="radio" id="Admin" name="User" value="Admin">
            <label for="Admin">Admin</label><br>

            <input type="radio" id="EventManger" name="User" value="EventManger">
            <label for="EventManger">EventManger</label><br>
         

            <button   class="buttonstyle"style="width:230px ;height: 39px;"  >Log In</button>
            </form>

            <a href="Regester.php" class="newuser"style="  text-decoration: none;
  color: #063a62db;">new user? click hear!</a>
  <br>

        </div>

    </div>
    
</body>
</html>