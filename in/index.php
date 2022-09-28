<?php 

include '../config.php';

session_start();

error_reporting(0);



if (isset($_POST['officer'])) {
	$off_id = $_POST['off_id'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM officer WHERE off_id='$off_id' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['off_id'] = $row['off_id'];
    $_SESSION['username'] = $row['officer_name'];

		header("Location: ../officer/dashboard");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}


if (isset($_POST['admin'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];

		header("Location: ../admin/dashboard");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}


?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <head>
	<meta charset="UTF-8">
	<title>AnimaForm</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="forms-section">
  <h1 class="section-title">Login Panel</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        OFFICER
        <span class="underline"></span>
      </button>
      <form class="form form-login" action="index.php" method="POST">
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">Officer ID</label>
            <input id="login-email" name="off_id" type="id" required>
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" name="password" type="password" required>
          </div>
        </fieldset>
        <button type="submit" name="officer" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        ADMIN
        <span class="underline"></span>
      </button>



      <form class="form form-signup" action="index.php" method="POST">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">E-mail</label>
            <input id="signup-email" name="email" type="email" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" name="password" type="password" required>
          </div>
         
        </fieldset>
        <button type="submit" name="admin" class="btn-signup">Login</button>
      </form>
    </div>
  </div>
</section>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
