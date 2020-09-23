<?php
require "conn.php";
$error = 0;
if( $_SERVER["REQUEST_METHOD"]=="POST"){

  $username = $_POST["uname"];
  $pass = $_POST["psw"];
 
  $sql = "select * from users where username = '$username' and password = '$pass' and designation = 0";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
    redirect('reg.php');
} else {
    $error = 1;
}
}
$conn->close();


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/staff_login.css">
</head>


<body style="background-image:url('images/6880.jpg'); 
             background-repeat: no-repeat ;
             background-size:100%;
             background-attachment: fixed;">

<h2>Staff Login Form</h2>



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"   method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <button type="submit">Login</button>
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> -->
    </div>

    <!-- <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div> -->
    <?php

    if( $error ==1){
      echo "<p style ='color : red;'>Login Failed</p>";
    }
    ?>
  </form>
 
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
</script>

</body>
</html>



