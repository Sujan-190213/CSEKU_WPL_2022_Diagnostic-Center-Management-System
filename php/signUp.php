<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/signUp.css" />
  </head>
<body>

<div  class="cointainersignup">
  <div style="margin-right: 600px; ">
    <button style="padding: 10px 20px 10px 20px;border-radius: 4px;">
      <a href="homePage.php">Home</a>
    </button>
  </div>

  <?php
    $connect =mysqli_connect("localhost:3307","root","","diagnostic_center_test") or die("Connection failed");

    $error = "";
    $success = "";



		if(isset($_POST['full_name']) && isset($_POST['email']) && 
    isset($_POST['user_name']) && isset($_POST['password']) && 
    isset($_POST['repeat_password']) && isset($_POST['agree'])){
			$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			$repeat_password = $_POST['repeat_password'];
			$agree = $_POST['agree'];

      $checkUser = "SELECT * FROM signup where user_name='$user_name'";
      $result = mysqli_query($connect,$checkUser);
      $count = mysqli_num_rows($result);

      if($count > 0){
        $error = "User name Already Exist";
        $success = "";
      }
      else{
        if($password === $repeat_password){
          $sql = "INSERT INTO signup (full_name, email, user_name, password, repeat_password, agree) 
          VALUES('$full_name', '$email', '$user_name', '$password','$repeat_password','$agree')";
          if(mysqli_query($connect,$sql)){
            // header("Location:{$hostname}/DCMS/db/html/appoinment.php");
            header("Location:{$hostname}/DCMS/db/html/signup-response.php");
          }
        }
        else{
          $error = "Invalid Credentials";
          $success = "";
        }

      }
		
		}

	?>


  <div class="cardsu" style="border-radius: 25px;">
   <div class="inner-boxsu" >
   <div class="card-fornts" style="border-radius: 25px;">

    <h1>Sign Up</h1>
    <p class="error" style="color: red; font-weight:bold;"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
    <br>
    <form method="POST">
          <label for="email" style="color: white;">Full Name</label>
          <input type="text" name="full_name" id="name" class="input_boxs" required  /><br /><br />

          <label for="email" style="color: white;">Email</label><br>
          <input type="email" name="email" id="email"class="input_boxs" required /><br /><br />
          
          <label for="email" style="color: white;">User Name</label>
          <input type="text" name="user_name" id="usrname"class="input_boxs" required /><br /><br />
          <label for="pass" style="color: white;">Password</label>
          <input type="password" name="password" class="input_boxs" required/><br /><br />
          <label for="pass" style="color: white;">Repeat Password</label>
          <input type="password" name="repeat_password" class="input_boxs" required/><br /><br />
          <input type="checkbox" value="agree" name="agree"/>
        <label for="rememberMe" style="color: white;">I agree to the Terms of user</label><br /><br />
          
          <input type="submit" value="Submit" style="padding: 12px; border-radius: 6px;"/>
        </form>
        <!-- <div>
            <button  class="input_boxs2">
              <h3><a href="appoinment.html" class="submits">Submit </a></h3>
            </button>
          </div> -->
     
   </div>

   <div class="card-backs"></div>

   </div>


  </div>

    
</div>



</body>
</html>