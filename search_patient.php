<!DOCTYPE html>
<html>
<head>
    <title>Search patients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/search_patient.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Button to open the modal -->
<div class="mainpage">
        <section>
            <form method='POST' action = 'patient_details.php'>
                <input type = 'text' class='patientid' name = 'patientId' placeholder='Enter patient id'>
                <button class = 'button' type ='submit'>Search</button>
            </form>
            <a href="index.html" class="btn btn-primary" style="margin-top:10px;">Logout</a>
        </section>
   
       
</div> 
</body>
</html>