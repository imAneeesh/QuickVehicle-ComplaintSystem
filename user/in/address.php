<?php 
include '../../config.php';


session_start();

$chas_no = $_SESSION['chas_no'];



    if (isset($_POST['send'])) {
    	
    $addr = $_POST['addr'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
      
      
   
      
          $sql = "INSERT INTO address
          VALUES('$chas_no','$addr','$district', '$state','$zip')";
          $result = mysqli_query($conn, $sql);


          if ($result) {
            echo "<script>alert('Complaint Uploaded Successfully')</script>";
            header("Location: index.php");

         
          } else {
            echo "<script>alert('Woops! Something Went Wrong.')</script>";
        
      
      }
    }
      
      ?>
      




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Complaint</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700'><link rel="stylesheet" href="./uc_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<form action='address.php' class='form' method="POST">

  <p class='field'>
      <Address>
    <label class='label' for='login'>Address
      <br><h4>Street</h4>
    </label>
    <input class='text-input' cols='50' id='address' name='addr' required type='text' value=''>
  </p>
  <p class='field half required'>
    <label class='label' for='password'>District</label>
    <input class='text-input' id='district' name='district' required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='password'>State</label>
    <input class='text-input' id='state' name='state' required type='text'>
  </p>
  <p class='field half required'>
    <label class='label' for='password'>Zip Code</label>
    <input class='text-input' id='zip' name='zip' required type='text'>
  </p>

  <!-- <p class='field'>
    <label class='label' for='about'>Complaint Description</label>
    <textarea class='textarea' cols='50' id='about' name='Description' rows='4'></textarea>
  </p>
  -->
  <p class='field half'>
    <input class='button' type='submit' name='send' value='Send'>
    
  </p>
</form>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.customSelect/0.5.1/jquery.customSelect.min.js'></script>
</body>
</html>
