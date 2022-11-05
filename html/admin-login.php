<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َTest Dept</title>
    <link rel="stylesheet" href="../css/admin-login.css">
  </head>
  <body>
  <div>
    <button class="home">
      <a href="homePage.php">Home</a>
    </button>
  </div>
  <br>
  <br>


  <?php

    $error = "";
    $success = "";

    $connect =mysqli_connect("localhost:3307","root","","diagnostic_center_test") or die("Connection failed");
    if(!empty($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = "SELECT * from admin_login where email='$email' and password='$password'";
      $result = mysqli_query($connect,$query);
      $count = mysqli_num_rows($result);
      if($count>0){
        header("Location:{$hostname}/DCMS/db/html/../Admin/homepage_admin.php");
      }
      else{
        $error = "Invalid Credentials";
        $success = "";
      }

    }

	?>


<!-- Login with Session -->

<?php

if(!empty($_POST['submit'])){
  $user_name = $_POST['email'];
  $password = $_POST['password'];

  session_start();
  $_SESSION['admin'] = true;
   header("Location:{$hostname}/DCMS/db/html/../Admin/homepage_admin.php");

}

?>



    <form class="box" method="POST">
      <h1>Login</h1>
      <p class="error"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
      <input type="text" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="submit" value="Login">
    </form>
  </body>
</html>

