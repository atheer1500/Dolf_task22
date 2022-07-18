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
    <title>View Events</title>
    <style>
        .search
{
  margin-left: 15%;
}
    </style>
</head>
<body  class="managerPage">
<div class="sidenav">
  <a href="ManagerHome.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="ManagerNewEvent.php"><i class="fa-solid fa-circle-plus"></i> Add Event </a>
  <a href="viewManger.php"><i class="fa-solid fa-circle-plus"></i> My events </a>
  <a href="index.html"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> <!--here we can move to php page that excute logout then header(location: index.html)-->
</div>
<div class="search-container">
<form  class="search" action="search.php" method="post">
  <input type="text" placeholder="Search for an event.." name="search" id="searchBar" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
<div id="events" class="ViewAllEvents">
    <?php include("viewman.php"); ?>
</div>
</body>
</html>