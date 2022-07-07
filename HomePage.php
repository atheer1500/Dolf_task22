<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/191f749b6c.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=yes, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="CSS/Maincss.css">
    <style type="text/css">


* {box-sizing:border-box}

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

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
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

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: rgba(255, 255, 255, .2);
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 14px;
  color: white;
  display: block;
  margin-bottom: 25px;
}

.sidenav a:hover {
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

</style>
</head>
<body class="homePage">
    
<div class="sidenav">
  <a href="#services"><i class="fa-solid fa-house"></i> Home</a>
  <a href="#clients"><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="#contact"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main">
<p> Recently added:</p>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <?php
  #Maisaa's username is localhost:3308 while Ather's is localhost:3306 
$conn = mysqli_connect("localhost:3308", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

//Show only last 3 events (newly added)
$query="SELECT * FROM (SELECT * FROM event ORDER BY EventID DESC LIMIT 3) as r ORDER BY EventID";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);


while ($row=mysqli_fetch_row($result))
{

echo
'<div class="mySlides fade">
<img class ="poster" src="'
. $row[7] .
'" style="width:100%">
<div class="text">'
. $row[1] .
'</div>
<button class="buttonstyle"><a href="Book.php"> Book Now</a></button>

</div>


';
		
}
?>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<hr>
<p>All Events:</p>

<?php
$conn = mysqli_connect("localhost:3308", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

$query="select * from event";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);

echo '<table cellpadding="40"  style = "text-align: center; margin-left:auto; margin-right: auto">';
$count = 0;
echo '<tr>';
while ($row=mysqli_fetch_row($result))
{
        $count ++;
        
        echo '<td>
        <img class ="poster" src="'
. $row[7] .

'" style="width:200px; height: 300px;">
<br><button class=" buttonstyle"><a href="Book.php"> Book Now</a></button>
        </td>';	
        //Add each 3 items in a new row
        if ($count % 3 == 0)	
        echo '</tr> <tr>';	
}
echo '</table>';
?>
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
</script>




</body>
</html>