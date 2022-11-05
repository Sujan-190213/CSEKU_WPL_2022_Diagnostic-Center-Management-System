<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up Edit</title>
    <style media="screen">
      input[type=text]{
        width: 350px;
        height: 40px;
        font-size: 17px;
        font-weight: bold;
      }
      input[type=submit]{
        width: 120px;
        height: 40px;
        margin-left: 100px;
        font-weight: bold;
        font-size: 20px;
      }
      form{
        margin-left: 400px;
        border: 5px solid black;
        width: 500px;
        padding: 50px;
        margin-top: 50px;
      }
      label{
        font-size: 28px;
        font-weight: bold;
      }
      p{
        color: red;
        font-weight: bold;
        margin-left: 390px;
      }
    </style>
  </head>
  <body>
    <a href="signup.php">Home</a>
    <?php
    ?>
     <form class="form2" action="signupedit.php" method="post">
                        <label for="">ID</label><br><br>
                       <input type="text" name="s_id" value="<?php echo $_POST['s_id']; ?>" > <br>
                       <label for="">Full Name</label><br><br>
                       <input type="text" name="full_name" value="<?php echo $_POST['full_name']; ?>" > <br>
                       <label for="">Email</label> <br><br>
                       <input type="text" name="email" value="<?php echo $_POST['email']; ?>" > <br>
                       <label for="">User Name</label> <br><br>
                       <input type="text" name="user_name" value="<?php echo $_POST['user_name']; ?>" ><br>
                       <label for="">Password</label><br><br>
                       <input type="text" name="password" value="<?php echo $_POST['password']; ?>" ><br><br>
                       <label for="">Repeated Password</label> <br><br>
                       <input type="text" name="repeat_password" value="<?php echo $_POST['repeat_password']; ?>" ><br>
                       <label for="">Agreement</label><br><br>
                       <input type="text" name="agree" value="<?php echo $_POST['agree']; ?>" ><br>
                       <input type="submit" name="update" value="Update">
      </form>
     <?php
     include('conn.php');
     if (isset($_POST['update'])) {
       $s_id=$_POST['s_id'];
       $full_name=$_POST['full_name'];
       $email=$_POST['email'];
       $user_name=$_POST['user_name'];
       $password=$_POST['password'];
       $repeat_password=$_POST['repeat_password'];
       $agree=$_POST['agree'];

       $sql5="UPDATE signup SET s_id='$s_id',full_name='$full_name',email='$email',user_name='$user_name',password='$password', repeat_password='$repeat_password', agree='$agree' where s_id='$s_id'";
       $query5=mysqli_query($conn,$sql5);

       if($query5){
         ?>
              <p style="margin-left:600px; color:blue;">
               Updated Successfully
              </p>
         <?php
       }
      //  sleep(1);
      //  header("Location:appointment.php");

     }



     ?>

  </body>
</html>
