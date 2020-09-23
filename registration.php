<?php

	require "conn.php";
	$success = "";
	if( $_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST['gender'])){
		$fname = $_POST['fname'];
		$minit = $_POST['minit'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$bloodgroup = $_POST['bloodgroup'];
		$dob = $_POST['dob'];
		$medical_issues = $_POST['medical_issues'];
		$guardian = $_POST['guardian'];
		$guard_relationship = $_POST['guard_relationship'];
		$adhar = $_POST['adhar'];
		
		$sql = "insert into patients (`fname`, `minit`, `lname`, `gender`, `address`, `mobile`, `bloodgroup`, `dob`, `medical_issues`, `guardian`, `guard_relationship`,`adhar`) 
			values ('$fname','$minit','$lname','$gender','$address','$mobile','$bloodgroup','$dob','$medical_issues','$guardian','$guard_relationship','$adhar')";
		if(mysqli_query($conn,$sql))
		{
			$lastid = mysqli_insert_id($conn);
			$success = "Registered Successfully. The patient ID is : ".$lastid;
		}
		else{
				$success = "Failed to insert. ".$conn->error;
		}
	}
	else if($_SERVER["REQUEST_METHOD"]=="POST")
				$success = "Please select the gender";
?>



<!DOCTYPE html>
<html>
<head>
<title> Patient Registration</title>
<link rel="stylesheet" type="text/css" href="styles/registration.css">	
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	
	<form class = "myform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method = "POST">
		<h2>Enter new patient details</h2>
		First name : <input type = "text"  required style = "float:right" name ="fname"><br><br>
		Middle name : <input type = "text"  style = "float:right" name = "minit"><br><br>
		Last name : <input type = "text"  required style = "float:right" name = "lname"><br><br>
		Gender : <div style = "float:right"><input type="radio" id="rg-female" name="gender" value="female"  >
						<label for="rg-female">
							Female
						</label>
				<input type="radio" id="rg-male" name="gender" value="male">
					<label for="rg-male">
						Male
					</label></div><br><br>
		Address : <input type = "text"  required style = "float:right" name="address"><br><br>
		Mobile no. : <input type = "phone" required style = "float:right" name="mobile"><br><br>
		Adhar no. : <input type = "text" required style = "float:right" name="adhar"><br><br>
		Blood group :<div style = "float:right">
					<select name="bloodgroup">
						<option value="B+ve">B+ve</option>
						<option value="B-ve">B-ve</option>
						<option value="O+ve">O+ve</option>
						<option value="O-ve">O-ve</option>
					</select>
					</div><br><br>
		Date of birth : <input type = "text" required style = "float:right" name="dob" placeholder = "dd-mm-yyyy" pattern = "^((0|1)\d{1})-((0|1|2)\d{1})-((19|20)\d{2})"><br><br>
		Medical Issues : <input type = "text" required style = "float:right" name="medical_issues"><br><br>
		Guardian's full name  : <input type = "text" required style = "float:right" name="guardian"><br><br>
		Relationship with the guardian : <input type = "text" required style = "float:right" name="guard_relationship"><br><br>
		<input type= "submit"> <input type="reset" style = "float:right">
		<p><?php echo $success;?></p>
	</form>
	<br>
	<h1>OR</h1>
	<div style = "background-color:rgb(210, 212, 206); padding-top:5%;padding-bottom:5%;">
		 <div style = "margin-left:2%;margin-right:1%;">
			<label>Enter Patient ID to edit details</label>
			<div  style = "float:right"  >
				<form method = "POST" action = "update_patient.php">
					<input name = "patientId" type = 'text' required>
					<button type = "submit" >Edit</button>
				</form>
			</div>
		 </div>
		 <a href="staff_login.php" class="btn btn-primary" style="    margin-top: 20px;margin-left: 1%;">Logout</a>
		 <p><?php echo $patient_not_found ;?> </p>
		
		
	</div>
</div>
</body>
</html>