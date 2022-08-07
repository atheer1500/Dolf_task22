<?php

use function PHPSTORM_META\type;
 
    include('connection.php'); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $Id=$_POST['Email'];
    $pass=$_POST['password']; 
    $type=$_POST['User'];
    $conn=OpenCon();
    session_start();
    $_SESSION["id"]=$Id;
    $_SESSION["pass"]=$pass;
      
      
        // $Id = stripcslashes($Id);  
        //  $pass = stripcslashes( $pass);  
        // $Id = mysqli_real_escape_string( $conn, $Id);  
        //  $pass = mysqli_real_escape_string( $conn,  $pass);  
      if ( $type=='UserEmail')
      {

        $sql = "SELECT `UserEmail` FROM `end_user` WHERE `UserEmail`='".$Id."' AND `Password`=".$pass.";";  
        
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);  
     
        if($count == 1)
        {  
        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        { 
        $_SESSION["userID"]=$row["UserEmail"]; //To book and edit account

         
           header("Location:HomePage.php") ;
        } 
     } 
        else
        {  
            header('location:wrongAccont.php');
            
            // echo "<h1> Login failed. Invalid username or password. user</h1>";  
        }    
        }
     
     else  if ($type=='Admin')
     {
       $sql = "SELECT `AdminID` FROM `admin` WHERE `AdminEmail`='".$Id."' AND `Passowrd`='".$pass."';";  
       $result = mysqli_query($conn, $sql);  
       $count = mysqli_num_rows($result);  
    
       if($count == 1){ 
       while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       {
        $_SESSION['AdminID']=$row["AdminID"];
       
        
       
           header("Location:AdminHome.php");   
       }
    }  
       else{  
        header('location:wrongAccont.php');
            
       }  
     } 
    }
    else if($type=='EventManger')
    {
        
        $sql = "SELECT `MangerID` FROM `event_manger` WHERE `MangerEmail`='".$Id."' AND `Password`=".$pass.";";  
        $result = mysqli_query($conn, $sql);  
        $count = mysqli_num_rows($result);  
    
        if($count == 1)
        { 
        while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                        $_SESSION['MangerID']=$row["MangerID"];
                        
                        header("Location:ManagerHome.php"); 
                }
        } 
         
            // echo "<h1><center> Login successful  EM</center></h1>"; 
          
        
        else{  
            header('location:wrongAccont.php');
        } 
    
    }

?>  