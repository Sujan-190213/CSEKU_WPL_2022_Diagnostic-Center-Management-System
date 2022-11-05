<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" href="Image/pic.png" type="image/gif/png">
    <style>
        h1{
            background-color: cadetblue;
            color: white;
            text-align: center;
            padding: 5px;
            margin-left: 0px;
        }
        .item{
            width: 210px;
            height: 35px;
            background-color:darkslateblue;
            padding: 15px;
            color: white;
            text-decoration: none;
            float: left;
            margin: 10px;
        }
        a:hover{
            opacity: .8;
            background-color:darkcyan ;
        }
        #content{
            margin-left: 200px;
            margin-top: 100px;
            width: 800px;
            height: 350px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
<button><a href="../html/homePage.php" style="text-decoration: none">Go Back Home</a></button>
<h1>Admin Dashboard</h1>



<!-- Login with session -->
<?php
  session_start();
  if($_SESSION['admin']!=true)
  {
    header("Location:{$hostname}/DCMS/db/html/admin-login.php");
  }
  if(isset($_POST['logout']))
  {
    session_unset();
    session_destroy();
    header("location:{$hostname}/DCMS/db/html/admin-login.php");
  }

  ?>



<div id="content">
    <a href="signup.php" class="item">Patient Information</a> 
    <a href="appointment.php" class="item">Appointment</a>
    <a href="test_information.php" class="item">Test Information</a>
    <a href="payment.php" class="item">Payment</a> <br>
    <a href="contact-us.php" class="item">Contact</a> <br>
</div>


<form action="homepage_admin.php" method="post">
      <button name="logout" style="margin-left:560px;margin-top:20px;padding:15px;border-radius:30px;">Log out</button>
    </form>
    
</body>
</html>