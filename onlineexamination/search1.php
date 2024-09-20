<?php
include 'connect.php';

$searchErr = '';
$student_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("select * from individual where adhaar like '%$search%' or adhaar like '%$search%'");
		$stmt->execute();
		$student_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//print_r($employee_details);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>
<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <title>Online exam Registration form</title>
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
			  <a class="nav-link active" aria-current="page" href="logout.php" style="margin-right:2px; margin-top:-50px; color:#C11C1C; font-size:15px;"><u><b>Logout</b></u></a>
			</li>			
		  </ul>		  
		</div>
	  </div>
	</nav>
	
	
	<form class="form-" action="#" method="post">
	
	
	
	
	<div class="table-responsive">          
	  <table class="table">
	   
	     	<center>
		   <tbody>
		   
		   <?php
		   // database connection, to get user data along with images
	$servername = "localhost";
	$database = "jatin";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);
	
	include 'connect.php';

			$searchErr = '';
			$student_details='';
				if(isset($_POST['save']))
			{
					if(!empty($_POST['search']))
			{
				$search = $_POST['search'];

				$stmt = $con->prepare("select * from individual where adhaar like '%$search%' or adhaar like '%$search%'");
				$stmt->execute();
				$student_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$search=$search;
		
			
		
	
		    $sql = "SELECT profile_pic from `individual` where adhaar like '%$search%' or adhaar like '%$search%' ";
					 $result = $conn->query($sql);
			}}
					 
       while($row = $result->fetch_assoc())
		   
		   {
   	?>

     <tr>
		<td><img style="margin-left:150px;" height="100" alt ="path not accurate " src="<?php echo $row ['profile_pic'];?>"  ></td>
	 </tr>
     <?php
		   }
		   ?>
		   
		   
	    		<?php
		    	 if(!$student_details)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
					

		    	 	foreach($student_details as $key=>$value)
		    	 	{
		    	 		?>
						
		    	 	    
						<tr>
		    	 		<td><?php echo $value['adhaar'];?></td>
						</tr>
						<tr>
		    	 		<td><?php echo $value['name'];?></td>
						</tr>
						<tr>
		    	 		<td><?php echo $value['father_name'];?></td>
						</tr>
						<tr>
		    	 		<td><?php echo $value['address'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['gender'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['state'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['city'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['dob'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['pincode'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['course'];?></td>
						</tr>
						<tr>
						<td><?php echo $value['email_id'];?></td>
						</tr>
						
		    	 		
		    	 		<?php
		    	 	}
		    	 	
		    	 }
		    	?>
	    	
	     </tbody>
		 </table>
	
    
    
	
	</center>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
	

  </body>
</html>



