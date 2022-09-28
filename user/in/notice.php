<?php 
include '../../config.php';


session_start();


$email=$_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Notification</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
          <h1> <span class="fab fa-asymmetrik"> </span> <span>Aizcar</span>
          </h1>
        </div>
        
        <div class="sidebar-menu">
          <ul>
            <li>
              <a href="index.php" class="active">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="complaint.php">
                <span class="fas fa-users" ></span>
                <span>Complaint</span>
              </a>
            </li>
            <li>
              <a href="notice.php">
                <span class="fas fa-stream"></span>
              <span>Notifications</span>
              </a>
            </li>
            <li>
              <a href="profile.php">
                <span class="fas fa-shopping-cart"></span>
                <span>Account</span>
              </a>
            </li>
           
              <a href="../../logout.php">
                <span class="fas fa-user-circle"></span>
                <span>Logout</span>
              </a>
            </li>
            
        </div>
    </div>    

    <div class="main-content">
      <header>
        <h2>
          <label for="nav-toggle">
            <span class="fas fa-bars"></span>
          </label>
          Dashboard
        </h2>

        <div class="search-wrapper">
          <span class="fas fa-search"> </span>
          <input type="search" placeholder="Search..." />

        </div>

        <div class="user-wrapper">
         <img src="https://bit.ly/3bvT89p" width="40px" height="40px" alt="profile-img">
         <div class="">
            <h4><?php echo $_SESSION['username']; ?></h4>
            <small><?php echo $_SESSION['email']; ?></small>
         </div>
        </div>
      </header>

      <main>
        <div class="cards">
          <div class="card-single">
            <div>
              <span> 
      <?php 




$email=$_SESSION['email'];

// $sql = "SELECT chas_no from  complaints where email='$email'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         $chas_no=$row['chas_no'];



        $sql = "SELECT * from  notice where email='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               echo " Registration Number: " . $row["reg_no"]. " <br>Chassis Number: " . $row["chas_no"]."<br>Officer Phone: " . $row["phone"]." <br>Address: " . $row["address"]. " <br>Station: " . $row["station"]. "<br><br>";
            }
        } else {
            echo "You do not have any Notifications...";
        }
        




  // }
// }

// else {
//     echo "You do not have any Notifications...";
// }







?></span>
            </div>
      


            
              <span class="fas fa-wallet"></span>
            </div>
          </div>





</div>


</main>
</div>
<!-- partial -->

</body>
</html>
