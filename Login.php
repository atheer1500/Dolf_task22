<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <!-- <?php
     include('connection.php');
     $conn=OpenCon();

     closeconn($conn);
    ?> -->
    <script>

       

    </script>
</head>
<body class="LoginRegisterPage">
    <div class="loginContainer">
        <h2> Consorts  </h2>
        <div class="loginBox">
            <form  id="login" action = "authentication.php" method="POST">
            
            <input  class="loginInputs" type="text" id="Email" name="Email" placeholder="ُE-maill address"><br><br>
            <input class="loginInputs" type="password" id="password" name="password" placeholder="Password"><br>
            <input type="radio" id="UserEmail" name="User" value="UserEmail">     
            <label for="UserEmail">User</label><br>

            <input type="radio" id="Admin" name="User" value="Admin">
            <label for="Admin">Admin</label><br>

            <input type="radio" id="EventManger" name="User" value="EventManger">
            <label for="EventManger">EventManger</label><br>


            <button  style="width:230px ;height: 39px;" onclick="validate()" >Log In</button>
            </form>

            <a href="Regester.php" class="newuser"style="  text-decoration: none;
  color: #063a62db;">new user? click hear!</a>
  <br>

        </div>

    </div>
    
</body>
</html>