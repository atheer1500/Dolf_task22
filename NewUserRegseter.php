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
        $sqlInsertNewUser="INSERT INTO `end_user` (`FirstName`, `LastName`, `Password`, `UserEmail`, `Gender`) VALUES
         ('".$FirstName."','".$LastName."','". $password."','". $Email."','".$Gender."')";
         if( mysqli_query($conn, $sqlInsertNewUser))
         {
            header("Location:Login.php");
         }
         else
         {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
         }

     }
       ?> 