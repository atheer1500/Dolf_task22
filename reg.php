<?php      
    include('connection.php'); 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $Id=$_POST['Email'];
    $pass=$_POST['password']; 
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $gender=$_POST['Gender'];
    $conn=OpenCon();
      
      
        // $Id = stripcslashes($Id);  
        //  $pass = stripcslashes( $pass);  
        // $Id = mysqli_real_escape_string( $conn, $Id);  
        //  $pass = mysqli_real_escape_string( $conn,  $pass);  
      
        $sql = "INSERT INTO `end_user`(`FirstName`, `LastName`, `Password`, `UserEmail`, `Gender`) VALUES ('".$Fname."','".$Lname."','".$pass."','".$Id."','".$gender."');";  
        // // // $result = mysqli_query($conn, $sql);  
        // // // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        // // // $count = mysqli_num_rows($result);  
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
       
    }
?>  