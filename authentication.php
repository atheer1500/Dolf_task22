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
      if ($type=='UserE')
      {
        $sql = "SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='$Id' AND `Password`=".$pass.";";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
     
        if($count == 1){  
           header("Location:HomePage.php") ;
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password. user</h1>";  
        }    
     }
     else  if ($type=='Admin')
     {
       $sql = "SELECT `AdminID` FROM `admin` WHERE `AdminEmail`='.$Id.' AND `Passowrd`='".$pass."';";  
       $result = mysqli_query($conn, $sql);  
       
       while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       {
        $_SESSION['AdminID']=$row["AdminID"];
       $count = mysqli_num_rows($result);  
    
       if($count == 1){  
           echo "<h1><center> Login successful  Admin</center></h1>";  
       }  
       else{  
           echo "<h1> Login failed. Invalid username or password.Admin</h1>";  
       }  
     } 
    }
    else if($type=='EventManger')
    {
        
        $sql = "SELECT `MangerID` FROM `event_manger` WHERE `MangerEmail`='".$Id."' AND `Password`=".$pass.";";  
        $result = mysqli_query($conn, $sql);  
        
                if ($result->num_rows ==1)
                 {
                    // output data of each row
                    while($row = $result->fetch_assoc())
                    {
                        $_SESSION['MangerID']=$row["MangerID"];
                        
                        header("Location:ManagerHome.php"); 
                    }
                } 
         
            // echo "<h1><center> Login successful  EM</center></h1>"; 
          
        
        else{  
            echo "<h1> Login failed . Invalid username or password. EM</h1>";  
        } 
    
    }
}
?>  