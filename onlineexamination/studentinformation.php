<?php
session_start(); // Session starts here.
if (isset($_POST['name'])) {
 if (empty($_POST['name'])){ 
 $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again"; // Setting error message.
 header("location: studentinformation.php"); // Redirecting to second page. 
 } else {
 // Fetching all values posted from second page and storing it in variable.
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 }
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fill your Information</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	
	<script type="text/javascript">
var citiesByState = {
Odisha: ["Bhubaneswar","Puri","Cuttack"],
Maharashtra: ["Mumbai","Pune","Nagpur"],
Kerala: ["kochi","Kanpur"],
Punjab: ["Amritsar","Ludhiana","Firozpur","Faridkot","Patiala","Moga","Jalandhar","Hushianpur","Bathinda"],
Chandigarh: ["Chandigarh"],
Rajasthan: ["Bikaner","Jodhpur","Sikar","Bundi","Nagpur","Udaipur"],
Haryana: ["Ambala","Gurgaon","Hisar","Karnal","Kurukshetra","Panipat","Rohtak","Yamuna_Nagar"]
}
function makeSubmenu(value) {
if(value.length==0) document.getElementById("city").innerHTML = "<option></option>";
else {
var citiesOptions = "";
for(cityId in citiesByState[value]) {
citiesOptions+="<option>"+citiesByState[value][cityId]+"</option>";
}
document.getElementById("city").innerHTML = citiesOptions;
}
}
function displaySelected() { var country = document.getElementById("state").value;
var city = document.getElementById("city").value;
alert(country+"\n"+city);
}
function resetSelection() {
document.getElementById("state").selectedIndex = 0;
document.getElementById("city").selectedIndex = 0;
}
</script>




</head>
<body onload="resetSelection()">

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img.jpg" alt="" style="height:1000px">
                </div>
                <div class="signup-form">
				<span id="error">
 <!---- Initializing Session for errors --->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
				
                    <form  class="register-form" id="register-form" action="questions.php" method="post" enctype="multipart/form-data">
                        <h2>student registration form</h2> 
						
                        <div class="form-row">
                            <div class="form-group" >
                                <label for="name">Name :</label>
                                <input type="text" name="name1" id="name1" required />
									
                            </div>
							<div>
							<label >Upload your Adhaarcard photo:</label> 
							<input  style="width:320px; " required="required" type="file" name="profile_pic" id="profile_pic" /><br> 
							</div>
						</div>
                        <div class="form-group">
                                <label for="father_name">Father Name :</label>
                                <input type="text" name="father_name" id="father_name" required />
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" name="address" id="address" required />
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value="male" id="male" checked>
                                <label for="male">Male</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value ="female" id="female">
                                <label for="female">Female</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                                <div class="form-select">
                                    			
									<select id="state" name="state" size="1" onchange="makeSubmenu(this.value)">
									<option value="" disabled selected>Choose State</option>
									<option>Odisha</option>
									<option>Maharashtra</option>
									<option>Kerala</option>
									<option>Punjab</option>
									<option>Chandigarh</option>
									<option>Rajasthan</option>
									<option>Haryana</option>

								</select>
									
                                       
                                
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city">City :</label>
                                <div class="form-select">
						
                                    <select name="city" id="city">
                                        <option value=""></option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">DOB :</label>
                            <input type="date" name="birth_date" id="birth_date">
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="text" name="pincode" id="pincode">
                        </div>
                        <div class="form-group">
                            <label for="course">Course :</label>
                            <div class="form-select">
                                <select name="course" id="course">
                                    <option value=""></option>
                                    <option value="computer">Computer Operator & Pragramming Assistant</option>
                                    <option value="desiger">Designer</option>
                                    <option value="marketing">Marketing</option>
									<option value="marketing">Web Design</option>
									<option value="marketing">Data Analyst</option>
									<option value="marketing">Animation</option>
									<option value="marketing">Computer science</option>
									<option value="marketing">Data Structure</option>
									<option value="marketing">Web Development</option>
									<option value="marketing">BCA</option>
									
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID :</label>
                            <input type="email" name="email" id="email" />
                        </div>
						
	


						
						
                        <div class="form-submit">
                          
                            <button type="submit" value="Submit Form" class="submit" name="submit" id="submit">Submit</button>
							
                        </div>
                    </form>
					
                </div>
            </div>
        </div>

    </div>
	

    <!-- JS -->
  
   
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>