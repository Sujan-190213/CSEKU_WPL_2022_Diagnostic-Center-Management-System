<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../css/patient-signin.css">   

</head>
<body>

   
    
  <div  class="cointainersignin">
    <div style="margin-right: 400px; ">
      <button style="padding: 10px 20px 10px 20px;border-radius: 4px;text-decoration: none;">
        <a href="homePage.php">Home</a>
      </button>
    </div>

<!-- Login With Session     -->

    <?php
    $connect = mysqli_connect("localhost:3307","root","","diagnostic_center_test") or die("Connection Failed");
    $error = "";
    $success = "";
    if(!empty($_POST['save'])){
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
      $query = "SELECT * FROM signup WHERE user_name='$user_name' and password='$password'";
      $result = mysqli_query($connect,$query);
      $count = mysqli_num_rows($result);
      if($count>0){
        // header("Location:{$hostname}/DCMS/db/html/patient-perform.php");
        session_start();
        $_SESSION['patient'] = true;
         header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$_POST['user_name']);
      }
      else{
        $error = "Invalid Credentials";
        $success = "";
      }
		
		}

	?>





  <div class="cardsi" style="border-radius: 20px;">
   <div class="inner-boxsi">
   <div class="card-fornti" style="border-radius: 20px;">
    <br />
    <h1>Log In</h1>
    <br>
    <p class="error"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
    <br>
    <form method="POST">
		  <label for="user_name">Username</label>
		  <input type="text" name="user_name"class="input_boxi" required /><br /><br />
		  <label for="pass">Password</label>
		  <input type="password" name="password" class="input_boxi" required/><br /><br />
          <!-- <div>
            <button class="input_boxi2">
              <h3><a href="giveTestResult.html" class="submiti">See Report</a></h3>
          </button>
        </div> -->
        <input type="submit" name="save" value="Submit" style=" margin-left: 110px; padding: 10px 12px 10px 12px; border-radius: 16px;"/>  
        </form>
   </div>
   </div>
  </div>  
</div>


</body>
</html>