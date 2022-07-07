<?php      
    include('connection.php'); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $Id=$_POST['Email'];
    $pass=$_POST['password']; 
    $conn=OpenCon();
      
      
        // $Id = stripcslashes($Id);  
        //  $pass = stripcslashes( $pass);  
        // $Id = mysqli_real_escape_string( $conn, $Id);  
        //  $pass = mysqli_real_escape_string( $conn,  $pass);  
      if (!preg_match("/^AD/",$Id)&&!preg_match("/^EM/",$Id))
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
     else  if (preg_match("/^AD/",$Id))
     {
       $sql = "SELECT `AdminEmail` FROM `admin` WHERE `AdminID`='$Id' AND `Passowrd`=".$pass.";";  
       $result = mysqli_query($conn, $sql);  
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
       $count = mysqli_num_rows($result);  
    
       if($count == 1){  
           echo "<h1><center> Login successful  Admin</center></h1>";  
       }  
       else{  
           echo "<h1> Login failed. Invalid username or password.Admin</h1>";  
       }    
    }
    else if(preg_match("/^EM/",$Id))
    {
        
        $sql = "SELECT `MangerEmail` FROM `event_manger` WHERE `MangerID`='$Id' AND `Password`=".$pass.";";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
     
        if($count == 1){  
            echo "<h1><center> Login successful  EM</center></h1>";  
        }  
        else{  
            echo "<h1> Login failed . Invalid username or password. EM</h1>";  
        } 
    }
    }
?>  