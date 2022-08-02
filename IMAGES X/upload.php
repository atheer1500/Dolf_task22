
  <?php
	$user=$_POST['username'];
	$image=$_FILES['myfile'];
	echo "Hello $user <br/>";
	echo "File Name<b>::</b> ".$image['name'];

	move_uploaded_file($image['tmp_name'],"images/".$image['name']);

	
	//here the "photos" folder is in same folder as the upload.php, 
	//otherwise complete url has to be mentioned
	?>