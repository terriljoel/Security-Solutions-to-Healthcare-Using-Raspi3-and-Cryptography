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
        <title>
            Home
        </title>
        <link rel="stylesheet" href="styles/reg.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <main>
            <section class = "reg-form">
                <form class="form-horizontal" action="update.php"  method = "POST">
                <div class="form-group">
                      <label class="control-label col-sm-2" for="patientId">Patient ID:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="patientId" name="patientId" value="<?php echo $patientId; ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="fname">First name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fname" name="fname" value = "<?php  echo $fname; ?>" placeholder="Enter firstname" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="minit">Middle name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="minit" name="minit" value = "<?php echo $minit; ?>" placeholder="Enter middle name" >
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="lname">Last name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" name="lname" value = "<?php echo $lname; ?>" placeholder="Enter lastname" required>
                      </div>
                    </div>

                    <div class="form-group">        
                        <label class="control-label col-sm-2" for="radio">Gender</label>
                        <div class="col-sm-10">
                          <div class="form-check" id="radio">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
                            <label class="form-check-label" for="gridRadios1">
                              Male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                            <label class="form-check-label" for="gridRadios2">
                              Female
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address :</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="address" value = "<?php echo $address; ?>" name="address" placeholder="Enter address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mobile">Mobile number:</label>
                        <div class="col-sm-10">
                          <input type="phone" class="form-control" id="mobile" name="mobile" value = "<?php  echo $mobile; ?>" placeholder="Enter mobile number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="adhar">Aadhar number:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="adhar" pattern="[0-9]{12}" name="adhar" value = "<?php  echo $adhar;?>" name="adhar" placeholder="Enter adhar number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="bloodgroup">Blood group:</label>
                        <div class="col-sm-10">
                            <select name="bloodgroup" class="form-control" value = "<?php echo $bloodgroup; ?> id="bloodgroup">
                                <option value="B+ve">B+ve</option>
                                <option value="B-ve">B-ve</option>
                                <option value="O+ve">O+ve</option>
                                <option value="O-ve">O-ve</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dob">Date of birth:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="dob" name="dob" pattern = "^((0|1)\d{1})-((0|1|2)\d{1})-((19|20)\d{2})" value = "<?php echo $dob;?>" placeholder="dd-mm-yyyy" pattern = "^((0|1)\d{1})-((0|1|2)\d{1})-((19|20)\d{2})" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="medical_issues" >Medical issues:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="medical_issues" value = "<?php echo $medical_issues;?>" name="medical_issues" placeholder="Medical issues" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="guardian">Guardian's full name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Guardian" value = "<?php echo $guardian;?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="guard_relationship">Relationship with the guardian:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="guard_relationship" name="guard_relationship" value = "<?php echo  $guard_relationship;?>" placeholder="Relationship with the guardian" required>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                  <a href="index.html" class="btn btn-primary" style="    margin-top: 20px;margin-left: 1%;">Logout</a>
                  <a href="reg.php" class="btn btn-primary" style="    margin-top: 20px;margin-left: 1%; ">Back</a>
            </section>
        </main>
    </body>
</html>
