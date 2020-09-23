<?php
  require "conn.php";
  $patientId = $_POST['patientId'];
  $found = 0;
  $sql = "select * from patients where id = '".$patientId."'";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    $found = 1;
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
    $adhar = $row['adhar'];
    }
    $sql = "select * from scanned_data where id = '".$patientId."'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $bodytemp = $row['bodytemp'];
            $heartrate = $row['heartrate'];
            $bodytemp = shell_exec("python3 decryption.py $adhar $dob $fname $bodytemp");
            $heartrate = shell_exec("python3 decryption.py $adhar $dob $fname $heartrate");
    }
    }
    else{
        $bodytemp = $heartrate = "No scanned data available";
        
    }
  }
  else{
     
  }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Patient details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/patient_details.css">
        <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body style="background-image:url('images/6880.jpg'); 
             background-repeat: no-repeat ;
             background-size:100%;
             background-attachment: fixed;">
        <div class = "mainpage">
             <section>
                 <div>
             <?php
                if ( $found ==0){
                   echo " <table class = 'patient-details-tab' style = 'display:none;'>";
                   echo "<h2>Invalid Id</h2>";
                }
                else{
                    echo  "<table class = 'patient-details-tab' style = 'display:block;'>";
                }
                ?>
                    <tr>
                        <th>Patient Name</th>
                        <td><?php echo "".$fname." ".$minit." ".$lname;?></td> 
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $gender; ?></td> 
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $dob; ?></td> 
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td><?php echo $bloodgroup; ?></td> 
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $address; ?></td> 
                    </tr>
                    <tr>
                        <th>Mobile No.</th>
                        <td><?php echo $mobile; ?></td> 
                    </tr>
                    <tr>
                        <th>Guardian name</th>
                        <td><?php echo $guardian; ?></td> 
                    </tr>
                    <tr>
                        <th>Relationship with the Guardian</th>
                        <td><?php echo $guard_relationship; ?></td> 
                    </tr>
                    <tr>
                        <th>Medical Issues</th>
                        <td><?php echo $medical_issues; ?></td> 
                    </tr>
                    <tr>
                        <th>Body temperature</th>
                        <td><?php echo $bodytemp; ?></td> 
                    </tr>
                    <tr>
                        <th>Heart rate</th>
                        <td><?php echo $heartrate; ?></td> 
                    </tr>
                </table>
                <form method="POST" action = "patient_details.php">
                    <input type = "text" class="patientId" name = "patientId" placeholder="Enter patient id">
                <button class = "button" type ="submit" >Search</button>
               
                <a href="index.html" class="btn btn-primary" style="margin-top:10px;">Logout</a>

            </form>
            </div>
             </section>
        </div>

    </body>
</html>