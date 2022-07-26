<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css?v=<?php echo time(); ?>">
    <style type="text/css">


/* * {box-sizing:border-box} */

/* Slideshow container */
.slideshow-container {
  max-width: 300px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}


/* Caption text */
.text {
  color: black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: -10px;
  width: 100%;
  text-align: center;
  font-weight: lighter;
}

.title
{
  background-color: white;
  border-radius: 50px 15px 50px  15px;
  padding: 5px;

}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #C0C0C0;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #8497b5;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

.poster{
    height: 450px;
    
}

input[type=search]{
text-align: left;
}

</style>
</head>
<body class="homePage">
    


<div class="sidenav">
  <a href="homepage.php" class="focused"><i class="fa-solid fa-house"></i> Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card"></i> My profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user"></i> My account </a>

  <a href="Mytickets.php"><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main">
<h3> Recently Added <h3>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <?php
  session_start();
  #Maisaa's username is localhost:3308 while Ather's is localhost:3306 
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

//Show only last 3 events (newly added)
$query="SELECT * FROM (SELECT * FROM events ORDER BY EventID DESC LIMIT 3) as r ORDER BY EventID";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);


while ($row=mysqli_fetch_array($result))
{

echo
'<div class="mySlides fade">
<img class ="poster imgborder" src="'
. $row[6] .
'" style="width:100%"> <br><br><br>
<div class="text">
<p class ="title">
'
. $row[1] .
'
</p>
<br>
<a href="Book.php" class="buttonstyle2"> Book Now</a>

</div>

</div>


';
$_SESSION['EventID']=$row[0];
		
}
?>


</div>

<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<hr>
<h3>All Events</h3>
<div class="left">
  <input type="text" class="searchBar" placeholder="Search event..." name="search" id="searchbar">
  <span class="searchIcon" onclick = "searchEvents()"><i class="fa fa-search fa-2xs"></i></span>
</div>

<?php
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query="select * from events";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_array($result))
{  
  $_SESSION['EventID']=$row['EventID'];
        $count ++;
        
        echo '<td>
        <img class ="poster" src="'
. $row[6] .

'" style="width:200px; height: 300px;"> 
<p class ="events" style="font-size: medium; font-weight: bold;">
'
. $row[1] . 
'</p>
<a href="Book.php"  class="buttonstyle"> Book Now</a>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>

<footer>



<div style="float: left; width: 200px; ">
 <h2>Location</h2>
 <p class="content" ><a href="https://goo.gl/maps/9gHLJABFrQSNQtg2A" target="_blank">
  Prince Turkey Street - Al Khobar, Eastern Province, SA
  </a></p>
</div>


<div style="float: right; width: 200px; ">
<h2> About </h2>
<p class="content"> Our aim is to help users to book events tickets easily. </p>
</div>


<div style="margin: 0 auto; width: 200px;">
<h2>Contact Us</h2>

<span class="icons" style="margin-right: 25px">
  <i  class="fa-brands fa-twitter fa-xl"></i>
</span>

<span class="icons">
  <i class="fa-brands fa-instagram fa-xl"></i></span>
</div>

<br><br><br><br>

<p style="margin-bottom: -25px; opacity: 0.4;"> © 2022 Copyright: maevents.com </p>

</footer>

</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}




// // Change Image
// function changeImg(){	
// 	// Run function every x seconds
//     plusSlides(1);
//     window.setInterval(changeImg, time);
//   }

// // Run function when page loads
// //window.onload=changeImg;

// window.onload = function(){
//    setTimeout(changeImg, 3000)
// };



//search for event
function searchEvents() {
    let serachInput = document.getElementById('searchbar').value
    serachInput=serachInput.toLowerCase();

    let eventTitle = document.getElementsByClassName('events');

    for (i = 0; i < eventTitle.length; i++) { 
        if (!eventTitle[i].innerHTML.toLowerCase().includes(serachInput)) {
          eventTitle[i].parentElement.style.display="none";
        }
        else {
          eventTitle[i].parentElement.style.display="table-cell	";                 
        }
    }
}

// function showAll(){	
//   let serachInput = document.getElementById('searchbar').value
//   let eventTitle = document.getElementsByClassName('events');

//   if (serachInput == "") {
//     for (i = 0; i < eventTitle.length; i++) { 
//           eventTitle[i].parentElement.style.display="table-cell";
//   }
// }
// }

let searchInput = document.getElementById("searchbar")
let eventTitle = document.getElementsByClassName('events');

//If the user clears the search bar, show all events.
searchInput.oninput = function(){
  if(searchInput.value == "")
  {
    for (i = 0; i < eventTitle.length; i++) { 
    eventTitle[i].parentElement.style.display="table-cell";
}
  }
}

</script>




</body>
</html>