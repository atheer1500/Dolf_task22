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


/* Caption text */
.text {
  color: black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
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


/* .sidenav a:hover {
} */

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

</style>
</head>
<body onload="" class="homePage">
    


<div class="sidenav">
  <a href="homepage.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="UserProfile.php"><i class="fa-solid fa-id-card"></i> My profile </a>

  <a href="UserAccount.php"><i class="fa-solid fa-user"></i> My account </a>

  <a href=""><i class="fa-solid fa-ticket"></i> My tickets</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<div class="main">
<h3> Recently added:<h3>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <?php
  #Maisaa's username is localhost:3308 while Ather's is localhost:3306 
$conn = mysqli_connect("localhost:3306", "root", "", "event");
if (!$conn)
die ("Could not connect to the database");

//Show only last 3 events (newly added)
$query="SELECT * FROM (SELECT * FROM events ORDER BY EventID DESC LIMIT 3) as r ORDER BY EventID";
$result=mysqli_query($conn, $query);
$n= mysqli_num_rows($result);


while ($row=mysqli_fetch_row($result))
{

echo
'<div class="mySlides fade">
<img class ="poster" src="'
. $row[6] .
'" style="width:100%"> <br><br><br>
<div class="text">'
. $row[1] .
'
<br> <br>
<a href="Book.php" class="buttonstyle"> Book Now</a>

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
<p>All Events:</p>

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
while ($row=mysqli_fetch_row($result))
{  
  $_SESSION['EventID']=$row[0];
        $count ++;
        
        echo '<td>
        <img class ="poster" src="'
. $row[6] .

'" style="width:200px; height: 300px;">
<br><a href="Book.php"  class=" buttonstyle"> Book Now</a>
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





</script>




</body>
</html>