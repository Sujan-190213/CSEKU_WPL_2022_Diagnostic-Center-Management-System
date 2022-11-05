<!DOCTYPE html>
<html>
<head>
  <title>Contact us</title>
  <link rel="stylesheet" type="text/css" href="../css/contactUs.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
  <div>
    <button style="margin-left:720px;margin-top:20px;padding:10px;border-radius:30px;"><a href="homePage.php" style="text-decoration: none;padding: 15px;">Back To Home</a></button>
  </div>
  <br>

<!-- PHP CODE -->

<?php
    include('conn.php');

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$message = $_POST['message'];

		
		$sql = "INSERT INTO contact (name, email, phone, message) 
			                VALUES('$name', '$email', '$phone','$message')";
		if(mysqli_query($conn,$sql)){
				// echo "<h2>Your Response Received, Thanks</h2>";
        header("Location:{$hostname}/DCMS/db/html/contact-response.php");
		}else{
				echo "Failed!!";
		}
		
		}

	?>



  <div class="container">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2>Contact Us</h2>
        <form action="" method="POST">
        <input type="text" class="field" placeholder="Your Name" name="name" required>
        <input type="text" class="field" placeholder="Your Email" name="email" required>
        <input type="text" class="field" placeholder="Phone" name="phone" required>
        <textarea placeholder="Message" class="field" name="message" required></textarea>
        <input type="submit" name="submit" value="Send" class="btn">
        </form>
      </div>
    </div>
  </div>
</body>
</html>