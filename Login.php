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
     
function validate()
{
   
    let Email=document.forms["myform"]["Email"].value;
    let password=document.forms["myform"]["password"].value;
    let User=document.forms["myform"]["User"].value;
    var error=document.getElementById("ErrorMessege");

    let typeEmail=new Boolean((typeof Email === 'string'));
    let typePass=new Boolean((typeof password === 'string'));

    let lengthEmail=new Boolean((Email.length === 0));
    let lengthPass=new Boolean((password.length === 0));

    if ((typeEmail && lengthEmail)||(typePass && lengthPass)||(User==false))
    { 
        error.style.display="block";
    if ((typeEmail && lengthEmail)&&(typePass && lengthPass)&&(User==false))
   {
    
    error.innerHTML="Please Don't Leave Any Empty Field ";
    return false;
   }
   else if((typeEmail && lengthEmail)&&(typePass && lengthPass))
   {
    
    error.innerHTML="Please Fill The Email \<br>& Password Filed  ";
    
    return false;
   }
   else if((typeEmail && lengthEmail)&&(User==false))
   {
    
    error.innerHTML="Please Fill The Email Filed \<br>& choose the user type ";
    return false;
   }
   else if((typePass && lengthPass)&&(User==false))
   {
    
    error.innerHTML="Please Fill The password Filed \<br>& choose the user type ";
    return false;
   }
   else if((typeEmail && lengthEmail))
   {
    
    error.innerHTML="Please Fill The Email Filed ";
    return false;
   }
   else if((typePass && lengthPass))
   {
    
    error.innerHTML="Please Fill The password Filed ";
    return false;
   }
   else if((User==false))
   {
    
    error.innerHTML="Please choose the user type";
    return false;
   }
}
}
    </script>
    <style>

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