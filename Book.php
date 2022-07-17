<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Maincss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View conserts</title>
</head>
<body class="LoginRegisterPage">
   
<div class="sidenav">
  <a href="HomePage.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="#clients"><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="#contact"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>
<div class="Select-container">
      <label> Select a Consort:</label>
      <select id="Consort">
      <?php 
      $servername = "localhost:3308";
      $username = "root";
      $pass = "";
      $dbname = "event";
        
      // Create connection
      $conn = new mysqli($servername, $username, $pass, $dbname);
$sql = mysqli_query($conn, "SELECT `Title` FROM `event`");
while ($row = $sql->fetch_assoc()){
echo "<option value=\"owner1\">" . $row['Title'] . "</option>";
}
?> 
      </select>
    </div>

</body>
</html>