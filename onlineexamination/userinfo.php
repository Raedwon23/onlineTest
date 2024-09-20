<?php
if(isset($_POST))
{
	
	$to_upload_path = "";
	
	if(isset($_FILES) && !empty($_FILES))
	{
		$filename = $_FILES["profile_pic"]["name"];
		$to_upload_path = "uploads/".$filename; 
               // uploads folder must be inside your project root directory
		move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $to_upload_path);		
	}
	
	$servername = "localhost";
	$database = "jatin";
	$username = "root";
	$password = "";

	// Create connection
	$con = new mysqli($servername, $username, $password,$database);


$query = "insert into individual(profile_pic)
values('$to_upload_path')";

mysqli_query($con, $query);
header('location:questions.php');
$con->close();
}

?>  