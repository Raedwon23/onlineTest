
 <?php
 
  session_start();
  

 
 if (isset($_POST['wa'] )) 
 {
		if (!empty($_SESSION['post']))
	{
			if (empty($_POST['wa']))
			{ 
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: studentinformation.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.
 $con=mysqli_connect('localhost','root');
 

mysqli_select_db($con,'jatin'); // Storing values in database.




//mysqli_query($con, $query);

 $query = "insert into individual(adhaar,name,profile_pic,father_name,address,gender,state,city,dob,pincode,course,email_id,wrong_answers,right_answers,grade_percentage)
values('$name','$name1','$profile_pic','$father_name','$address','$gender','$state','$city','$birth_date','$pincode','$course','$email','$wa','$ra','$gp')";
 
 mysqli_query($con, $query);

 unset($_SESSION['post']); // Destroying session.
 }
 } 
 header('location:logout.php');
$con->close();
}

 
 ?>
 
