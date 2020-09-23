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
                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method = "POST">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="fname">First name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter firstname" required>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="minit">Middle name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="minit" name="minit" placeholder="Enter middle name" >
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="lname">Last name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter lastname" required>
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
                          <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="mobile">Mobile number:</label>
                        <div class="col-sm-10">
                          <input type="phone" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="adhar">Aadhar number:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" pattern="[0-9]{12}"id="adhar" name="adhar" placeholder="Enter aadhar number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="bloodgroup">Blood group:</label>
                        <div class="col-sm-10">
                            <select name="bloodgroup" class="form-control" id="bloodgroup">
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
                          <input type="text" class="form-control" id="dob" name="dob" placeholder="dd-mm-yyyy" pattern = "^((0|1)\d{1})-((0|1|2)\d{1})-((19|20)\d{2})" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="medical_issues">Medical issues:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="medical_issues" name="medical_issues" placeholder="Medical issues" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="guardian">Guardian's full name:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="guardian" name="guardian" placeholder="Guardian"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="guard_relationship">Relationship with the guardian:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="guard_relationship" name="guard_relationship" placeholder="Relationship with the guardian" required>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                  </form>
                  <p style="color:red;"><?php echo $success;?></p>
                  <h2>OR</h2>
                  <form class="form-horizontal" method = "POST" action = "update_patient.php">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="fname">Enter Patient Id to Edit details:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="patientId" name="patientId" placeholder="Enter patient id" required>
                      </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Edit</button>
                        </div>
                    </div>
                  </form>
                  <p><?php echo $patient_not_found ;?> </p>
                  <a href="index.html" class="btn btn-primary" style="    margin-top: 20px;margin-left: 1%;">Logout</a>
            </section>
        </main>
    </body>
</html>
