<?php
	require "conn.php";
    session_start();
    $id = $_SESSION['patientId'];
	
	if( $_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST['gender'])){
		$sql = "update patients set fname = '".$_POST['fname']."', minit = '".$_POST['minit']."',lname = '".$_POST['lname']."',
				gender = '".$_POST['gender']."', address = '".$_POST['address']."',mobile = '".$_POST['mobile']."',bloodgroup = '".$_POST['bloodgroup']."',
				dob= '".$_POST['dob']."',medical_issues='".$_POST['medical_issues']."', guardian= '".$_POST['guardian']."', guard_relationship = '".$_POST['guard_relationship']."',
				adhar = '".$_POST['adhar']."'
				WHERE id = '".$id."' ";
		if(mysqli_query($conn,$sql)){
			
			
			echo "<script type='text/javascript'>alert('success'); window.location ='reg.php';</script>";
		}
		else 
			echo $conn->error;
	}
	
	else if($_SERVER["REQUEST_METHOD"]=="POST")
		echo "<script type='text/javascript'>alert('Please select gender');window.location ='registration.php'</script>";
    ?>
