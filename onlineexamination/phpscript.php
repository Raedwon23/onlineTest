<?php
include 'connect.php';
$searchErr = '';
$student_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("select * from individual where id like '%$search%' or id like '%$search%'");
		$stmt->execute();
		$student_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>