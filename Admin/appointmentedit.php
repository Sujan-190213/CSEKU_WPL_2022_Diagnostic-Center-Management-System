<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Appointment Edit</title>
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
    <a href="appointment.php">Home</a>
    <?php
    ?>
     <form class="form2" action="appointmentedit.php" method="post">
                        <label for="">Appointment ID</label><br><br>
                       <input type="text" name="appointment_id" value="<?php echo $_POST['appointment_id']; ?>" > <br>
                       <label for="">Patient ID</label><br><br>
                       <input type="text" name="patient_id" value="<?php echo $_POST['patient_id']; ?>" > <br>
                       <label for="">Full Name</label> <br><br>
                       <input type="text" name="name" value="<?php echo $_POST['name']; ?>" > <br>
                       <label for="">Phone Number</label> <br><br>
                       <input type="text" name="phone" value="<?php echo $_POST['phone']; ?>" ><br>
                       <label for="">Gender</label><br><br>
                       <input type="text" name="gender" value="<?php echo $_POST['gender']; ?>" ><br><br>
                       <label for="">Age</label> <br><br>
                       <input type="text" name="age" value="<?php echo $_POST['age']; ?>" ><br>
                       <label for="">Selected Test</label><br><br>
                       <input type="text" name="selected_test" value="<?php echo $_POST['selected_test']; ?>" ><br>
                       <input type="submit" name="update" value="Update">
      </form>
     <?php
     include('conn.php');
     if (isset($_POST['update'])) {
       $appointment_id=$_POST['appointment_id'];
       $patient_id=$_POST['patient_id'];
       $name=$_POST['name'];
       $phone=$_POST['phone'];
       $gender=$_POST['gender'];
       $age=$_POST['age'];
       $selected_test=$_POST['selected_test'];

       $sql5="UPDATE appoinment SET appointment_id='$appointment_id',patient_id='$patient_id',name='$name',phone='$phone',gender='$gender', age='$age', selected_test='$selected_test' where appointment_id='$appointment_id'";
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
