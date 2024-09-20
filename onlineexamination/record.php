
<html>
  <body bgcolor="lightgrey">

<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-warning">
	  <div class="container-fluid ">
		
		
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		  <ul class="navbar-nav ">
			
			<li class="nav-item" style="margin-left:1550px">
			  <a class="nav-link active" href="admin.php">Close</a>
			  <a class="nav-link active" href="#">Print</a>
			</li>
			
			
		
			
			
		  </ul>		  
		</div>
	  </div>
	</nav>


<?php
// flag to print action message
if(isset($_GET['q']) && $_GET['q']=='save')
{
 echo "Successfully Saved.";
}
if(isset($_GET['q']) && $_GET['q']=='deleted')
{
 echo "Successfully Deleted";
}	

if(isset($_GET['q']) && $_GET['q']=='update')
{
 echo "Successfully Updated";
}	
// flag to print action message end

	// database connection, to get user data along with images
	$servername = "localhost";
	$database = "jatin";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	// write sql query for inserting data into users table.	
	$sql = "SELECT * FROM individual";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {?>
  
	
	<table border="1" width="100%" style="color:black";>
		<tr>
		 <td>Sr. No.</td>
		 <td>Name</td>
		 <td>Profile Pic</td>
		 <td>Father Name</td>
		 <td>Address</td>
		 <td>Gender</td>
		 <td>State</td>
		 <td>City</td>
		 <td>DOB</td>
		 <td>Pincode</td>
		 <td>Course</td>
		 <td>E-mail</td>
		 </tr>
	<?php $k = 1;
	while($row = $result->fetch_assoc()) { ?>
	
		<tr>
		 <td><?php echo $k++;?></td>
		 <td><?php echo $row['name'];?></td>
		 <td><img height="100" alt ="path not accurate " src="<?php echo $row['profile_pic'];?>"  ></td>
		 <td><?php echo $row['father_name'];?></td>
		 <td><?php echo $row['address'];?></td>
		 <td><?php echo $row['gender'];?></td>
		 <td><?php echo $row['state'];?></td>
		 <td><?php echo $row['city'];?></td>
		 <td><?php echo $row['dob'];?></td>
		 <td><?php echo $row['pincode'];?></td>
		 <td><?php echo $row['course'];?></td>
		 <td><?php echo $row['email_id'];?></td>
		 
		 
		 
		 </tr>
		 
	<?php }
	
	echo "<table/>";
	
	}
?>
<br/>

</body>
</html>