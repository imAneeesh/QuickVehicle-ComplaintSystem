<?php 
include '../../config.php';
session_start();

$email=$_SESSION['email'];

if (isset($_POST['send'])) {
  $reg_no = $_POST['reg_no'];
	$veh_name = $_POST['veh_name'];
	$owner_name = $_POST['owner_name'];
  $veh_color = $_POST['veh_color'];
  $chas_no = $_POST['chas_no'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];
   
       $sql1 = "SELECT * from notice where chas_no='$chas_no'";
              $result2 = $conn->query($sql1);
              if ($result2->num_rows == 0) {
        $sql = "SELECT * FROM complaints WHERE chas_no='$chas_no'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) 
        {
          $sql = "INSERT INTO `complaints`
          VALUES('$chas_no', '$reg_no', '$owner_name','$veh_name','$veh_color','$phone','$description','$email')";


          $result = mysqli_query($conn, $sql);
          if ($result) 
          {
            echo "<script>alert('Fill the Address.')</script>";
            $_SESSION['chas_no'] = $_POST['chas_no'];
             header("Location: address.php");
          } else 
          {
            echo "<script>alert('Woops! Something Went Wrong.')</script>";
          }
        } 
        else 
        {
          echo "<script>alert('Woops! Complaint already Exists.')</script>";
        }
 }else 
          {
            echo "<script>alert('Woops! Vehicle Found. Please See Notification')</script>";
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
<form action='complaint.php' class='form' method="POST">
  <p class='field required'>
    <label class='label required' for='name'>Full name of the Owner</label>
    <input class='text-input' id='name' name='owner_name' required type='text' value=''>
  </p>
  <p class='field required'>
    <label class='label required' for='phone'>Phone</label>
    <input class='text-input' id='phone' name='phone' required type='text' value=''>
  </p>
  <p class='field required half'>
    <label class='label' for='reg'>Vehicle Register Number</label>
    <input class='text-input' id='Reg_No' name='reg_no' required type='Registeration No'>
  </p>
  <p class='field half'>
    <label class='label' for='chas_no'>Chassis Number</label>
    <input class='text-input' id='chas_no' name='chas_no' type='text'>
  <p class='field half'>
    <label class='label' for='veh_name'>Vehicle Name</label>
    <input class='text-input' id='veh_name' name='veh_name' type='text'>
  </p>
  <p class='field half'>
    <label class='label' for='veh_color'>Vehicle Color</label>
    <input class='text-input' id='veh_color' name='veh_color' type='text'>
  </p>
  
  <p class='field'>
    <label class='label' for='about'>Complaint Description</label>
    <textarea class='textarea' cols='50' id='about' name='description' rows='4'></textarea>
  </p>
 
 
  <p class='field half'>
    <input class='button' type='submit' name='send' value='Next'>
  </p>
</form>

<form action="index.php" class="form">

<p class='field half'>
    <input class='button' href="home.php" type='submit' name='' value='Back'>
  </p>
    </form>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.customSelect/0.5.1/jquery.customSelect.min.js'></script>
</body>
</html>
