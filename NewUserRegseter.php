<?php
        include('connection.php');
     
     if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        $conn=OpenCon();
        session_start();

        $FirstName=$_POST['Fname'];
        $LastName=$_POST['Lname'];
        $Gender=$_POST['Gender'];
        $Email=$_POST['Email'];
        $password=$_POST['password'];
        

        $_SESSION["id"]=$Email;
     }
       ?> 