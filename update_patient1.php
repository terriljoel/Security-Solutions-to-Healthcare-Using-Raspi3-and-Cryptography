<?php
	require "conn.php";
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$_SESSION['patientId'] = $_POST['patientId'];
	$patientId = $_POST['patientId'];
	$sql = "select * from patients where id='$patientId'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()){
		$fname = $row['fname'];
		$minit = $row['minit'];
		$lname = $row['lname'];
		$gender = $row['gender'];
		$address = $row['address'];
		$mobile = $row['mobile'];
		$bloodgroup = $row['bloodgroup'];
		$dob = $row['dob'];
		$medical_issues = $row['medical_issues'];
		$guardian = $row['guardian'];
		$guard_relationship = $row['guard_relationship'];
		$adhar =$row['adhar'];	
		}
		

	}


	else{
		$patient_not_found = "Patient not found. Please check the ID.";
		redirect('update_patient.php');	
	}
}


	

?>


<!DOCTYPE html>
<html>
<head>
<title> Patient Registration</title>
<link rel="stylesheet" type="text/css" href="styles/registration.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class = "registration">
	
	<form class = "myform" action="update.php" method = "POST">
        <h2>Update patient details</h2>
        <label>Patient ID</label> <input type = "text" name = "patientId" style="float: right;" value="<?php echo $patientId; ?>" disabled><br><br>
		First name : <input type = "text"  required style = "float:right" name ="fname" value = "<?php  echo $fname; ?>"><br><br>
		Middle name : <input type = "text"  style = "float:right" name = "minit" value = "<?php echo $minit; ?>"><br><br>
		Last name : <input type = "text"  required style = "float:right" name = "lname" value = "<?php echo $lname; ?>"><br><br>
		Gender : <div style = "float:right"><input type="radio" id="rg-female" name="gender" value="female"  >
						<label for="rg-female">
							Female
						</label>
				<input type="radio" id="rg-male" name="gender" value="male">
					<label for="rg-male">
						Male
					</label></div><br><br>
		Address : <input type = "text"  required style = "float:right" name="address" value = "<?php echo $address; ?>"><br><br>
		Mobile no. : <input type = "phone" required style = "float:right" name="mobile" value = "<?php  echo $mobile; ?>"><br><br>
		Adhar no. : <input type = "text" required style = "float:right" value = "<?php  echo $adhar;?>" name="adhar"><br><br>
		Blood group :<div style = "float:right">
					<select name="bloodgroup" value = "<?php echo $bloodgroup; ?>">
						<option value="B+ve">B+ve</option>
						<option value="B-ve">B-ve</option>
						<option value="O+ve">O+ve</option>
						<option value="O-ve">O-ve</option>
					</select>
					</div><br><br>
		Date of birth : <input type = "text" required style = "float:right" name="dob" pattern = "^((0|1)\d{1})-((0|1|2)\d{1})-((19|20)\d{2})" placeholder = "dd-mm-yyyy" value = "<?php echo $dob;?>"><br><br>
		Medical Issues : <input type = "text" required style = "float:right" name="medical_issues" value = "<?php echo $medical_issues;?>"><br><br>
		Guardian's full name  : <input type = "text" required style = "float:right" name="guardian" value = "<?php echo $guardian;?>"><br><br>
		Relationship with the guardian : <input type = "text" required style = "float:right" name="guard_relationship" value = "<?php echo  $guard_relationship;?>"><br><br>
		<input type= "submit"> <input type="reset" style = "float:right">
		

	</form>
	
	<br>
	<a href="staff_login.php" class="btn btn-primary" style="    margin-top: 20px;margin-left: 1%; ">Logout</a>
</div>
</body>
</html>