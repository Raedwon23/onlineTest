<?php

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

    <title>Enter your Adhaar No.</title>
  </head>
  <body>
  <?php
session_start(); 
  $name = "";

    if(isset($_POST['submit'])) {

    //get the name and comment entered by user
    $name = $_POST['name'];
	

    //connect to the database
    $dbc = mysqli_connect('localhost', 'root', '', 'jatin') or die('Error connecting to MySQL server');
    $check=mysqli_query($dbc,"select * from name1 where name='$name' ");
    $checkrows=mysqli_num_rows($check);
  
   if($checkrows>0) {
      echo '<script>alert("you have already taken the test")</script>';
   } else {  
    //insert results from the form input
      $query = "INSERT  INTO name1(name) VALUES('$name')";

      $result = mysqli_query($dbc, $query) or die('Error querying database.');

      mysqli_close($dbc);
	  header('location:studentinformation.php');
    }
    echo "Customer Added";
    };
	foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
  ?>

 
  
  

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
    <form  method="post">
    <div class="wrapper">
		
		  
            <div class="form-group" >
			
                <label><font font-family: Arial, sans-serif; style="font-size:22px" color="#C11C1C">Enter your Adhaar number</font></label><br>
				</div>
				<br>
		
			 <div class="col-sm-4">
		      <input type="text" required minlength="12" maxlength="12" name="name" id="name" class="form-control"  style="width:200px; margin-left:-40px" >
		    
			
			</div>
			<br>
		    <div class="col-sm-2">
		      <button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button>
		    </div>
		</div>
                  
        </form>
    </div>
	


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



