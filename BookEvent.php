<?php
session_start();
include('connection.php'); 
$conn=OpenCon();
$SqlForFirstName="SELECT `FirstName` FROM `end_user` WHERE `UserEmail`='".$_SESSION["id"]."';";

if ($ResultSqlForFirstName = mysqli_query($conn, $SqlForFirstName))  
 {
  while($RowForFirstName =mysqli_fetch_array($ResultSqlForFirstName))
  {
    $_SESSION['FirstName']=$RowForFirstName['FirstName'];
    echo "Hi there !".$_SESSION['FirstName'];

  }
}

else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

// <div class="Select-container">
//       <label> Select a Consort:</label>
//       <select id="Consort">
//       <?php 
//       $servername = "localhost:3308";
//       $username = "root";
//       $pass = "";
//       $dbname = "event";
        
//       // Create connection
//       $conn = new mysqli($servername, $username, $pass, $dbname);
// $sql = mysqli_query($conn, "SELECT `Title` FROM `event`");
// while ($row = $sql->fetch_assoc()){
// echo "<option value=\"owner1\">" . $row['Title'] . "</option>";
// }

?>