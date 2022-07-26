<?php

if (isset($_POST['Tickets'])&&isset($_POST['Payment'])) 
{
session_start();
include('connection.php'); 
$conn=OpenCon();

$SqlInsertToBook="INSERT INTO `book`(`PaymentMethod`, `NumberOfTickets__`, `UserEmail`, `EventID`)
VALUES ('".$_POST['Payment']."','".$_POST['Tickets']."','".$_SESSION["userID"]."','".$_SESSION['EventID']."');";

$SqlUpdateEvent="UPDATE `events` SET `AvailableTickets__`='".($_SESSION['AvailableTickets__']-$_POST['Tickets'])."' WHERE `EventID`='".$_SESSION['EventID']."';";
if ($ResultSqlInsertToBook= mysqli_query($conn, $SqlInsertToBook)&&$ResultSqlUpdateEvent= mysqli_query($conn, $SqlUpdateEvent))  
{
    echo"
    <link rel='stylesheet' href='CSS/Maincss.css' media='all' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
          <style>
    
            td {
      text-align: left;
    }
    
    button, .buttonstyle, input[type=submit]
    {
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        border: 1px solid white;
        border-radius: 50px;
        padding: 10px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        font-size: medium;
        background: none;
        text-align: center;
        margin: 10px;
    }
    
    .container {
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        margin: auto;
        margin-top: 20px;
      margin-left: 33%;
        line-height: 30px;
        width: 500px;
      text-align: left;
      border-radius: 20px;
    }
    
    .container span {
        padding-left: 40px;
        display: inline-block;
      vertical-align: top;
        width: 30%;
    }
    
    .container input{
        min-height: 25px;
        display: inline-block;
        width: 50%;
    }
    
    .container textarea {
        display: inline-block;
        margin-top: 10px;
        width: 50%;
    }
    .container select,.container input[type=number] {
        min-height: 25px;
        display: inline-block;
        width: 51%;
       font-size: 15px;
    }
    /* 
     {
      max-height: 22px;
        display: inline-block;
    width: 51%;
       font-size: 15px;
    } */
    
    .right{
      text-align: right;
    }
    
    body{
      background: linear-gradient(#e66465, #9198e5);
        background-attachment: fixed;
        color: white;
        font-size:2em;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    
    }
    span.lab
    {
    
        display: inline-block;
      /* min-height: 25px; */
        /* width: 30%; */
      font-size: 15px;
      margin-top: 5px;
    }
    .pic 
    {
      margin-left: 26%;
    }
    
            </style>
    </head>
    <body class='LoginRegisterPage'>
       
    <div class='sidenav'>
      <a href='homepage.php' class='focused'><i class='fa-solid fa-house'></i> Home</a>
      <a href='UserProfile.php'><i class='fa-solid fa-id-card'></i> My profile </a>
    
      <a href='UserAccount.php'><i class='fa-solid fa-user'></i> My account </a>
    
      <a href=''><i class='fa-solid fa-ticket'></i> My tickets</a>
      <a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i> Logout</a>
    </div>
    
    
    </body>
    </html>";
}
else  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
}


?>
<!-- <html>
<script>

var NumberOfTickets = document.getElementById("Tickets").value;
document.write("NumberOfTickets");
</script></html> -->