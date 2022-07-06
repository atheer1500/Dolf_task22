<?php      
    include('connection.php'); 
    $Id=$_POST['Email'];
    $pass=$_POST['password']; 
      
        //to prevent from mysqli injection  
        // $Id = stripcslashes($Id);  
        //  $pass = stripcslashes( $pass);  
        // $Id = mysqli_real_escape_string($con, $Id);  
        //  $pass = mysqli_real_escape_string($con,  $pass);  
      
        $sql = "SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$Id."' AND `Password`=".$pass."";  
        $con=OpenCon();
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  