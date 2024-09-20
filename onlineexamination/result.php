
<!doctype html>
<html lang="en">
  <head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  	
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 25px; margin-top:25px;}
		body {
  background-color: white;
}
    </style>
  

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
  </head>
  <body>
  
  
  
  

<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/img1.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <center>
	<nav class="navbar navbar-expand-sm navbar-light bg-white" >
	  <div class="container-fluid ">
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		  <ul class="navbar-nav ">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="logout.php" style="margin-right:2px; margin-top:-20px; color:#C11C1C; font-size:15px;"><u><b>Logout</b></u></a>
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
	$sql = "SELECT * from `individual` ORDER BY ID DESC LIMIT 1;";
	// $sql = "select *from `name1`  INNER  JOIN individual ON individual.adhaar = name1.name;";
	  
	  // $sql="SELECT * FROM individual WHERE adhaar IN (SELECT * FROM name1 ORDER BY name1 DESC LIMIT 1);";
	$result = $conn->query($sql);
	
	
	if ($result->num_rows > 0) {?>
  
	
	<table border="1" width="100%" style="color:black";>
	

	<?php $k = 1;
	while($row = $result->fetch_assoc())
    		{ 
		
		
	
	
	
	?>
						<tr>
						<td><img height="100" alt ="path not accurate " src="<?php echo $row ['profile_pic'];?>"  ></td>
						</tr>
						<tr>
		    	 		<td><?php echo "<h9><font color=bluesize='1pt'><b>ID : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["id"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
		    	 		<td><?php echo "<h9><font color=Bluesize='1pt'><b> Name : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["name"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
		    	 		<td><?php echo "<h9><font color=bluesize='1pt'><b>FATHER-NAME : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["father_name"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
		    	 		<td><?php echo "<h9><font color=bluesize='1pt'><b>ADDRESS : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["address"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
						<td><?php echo "<h9><font color=bluesize='1pt'><b>GENDER : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["gender"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
						<td><?php echo "<h9><font color=bluesize='1pt'><b>STATE : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["state"]. "</b></u></h9></font><br>";?></td>
						</tr>
						<tr>
						<td><?php echo "<h10><font color=bluesize='1pt'><b>CITY : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["city"]. "</b></u></h10></font><br>";?></td>
						</tr>
						<tr>
						<td><?php echo "<h11><font color=bluesize='1pt'><b>DOB : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["dob"]. "</b></u></h11></font><br>";?></td>
						</tr>
						<tr>  
						<td><?php echo "<h12><font color=bluesize='1pt'><b>PINCODE : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["pincode"]. "</b></u></h12></font><br>";?></td>
						</tr> 
						<tr>    
						<td><?php echo "<h13><font color=bluesize='1pt'><b>COURSE : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["course"]. "</b></u></h13></font><br>";?></td>
						</tr>
						<tr>
						<td><?php echo "<h14><font color=bluesize='1pt'><b>EMAIL-ID: </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["email_id"]. "</b></u></h14></font><br>";?></td>
						</tr>	 
						<tr>
						<td><?php echo "<h15><font color=bluesize='1pt'><b>WRONG-ANSWERS : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["wrong_answers"]. "</b></u></h15></font><br>";?></td>
						</tr>
                        <tr>
						<td><?php echo "<h16><font color=bluesize='1pt'><b>RIGHT-ANSWERS : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["right_answers"]. "</b></u></h16></font><br>";?></td>
						</tr>
                        <tr>
						<td><?php echo "<h17><font color=bluesize='1pt'><b>GRADE_PERCENTAGE : </b></font> <font color=black font face='verdana' size='2pt'><u><b> " . $row["grade_percentage"]. "</b></u></h17></font><br>";?></td>
						</tr>						
		 
		 
		
		 
	<?php }
	
	echo "<table/>";
	
	}
?>
<br/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>