<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment Edit</title>
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
    <a href="payment.php">Home</a>
    <?php
    ?>
     <form class="form2" action="paymentedit.php" method="post">
                        <label for="">ID</label><br><br>
                       <input type="text" name="p_id" value="<?php echo $_POST['p_id']; ?>" > <br>
                       <label for="">Patient ID</label><br><br>
                       <input type="text" name="patient_id" value="<?php echo $_POST['patient_id']; ?>" > <br>
                       <label for="">Trx ID</label> <br><br>
                       <input type="text" name="trx_id" value="<?php echo $_POST['trx_id']; ?>" > <br>
                       <label for="">Feedback</label> <br><br>
                       <input type="text" name="feedback" value="<?php echo $_POST['feedback']; ?>" ><br>
                       <input type="submit" name="update" value="Update">
      </form>

<?php
     include('conn.php');
     if (isset($_POST['update'])) {
       $p_id=$_POST['p_id'];
       $patient_id=$_POST['patient_id'];
       $trx_id=$_POST['trx_id'];
       $feedback=$_POST['feedback'];

       $sql5="UPDATE payment SET p_id='$p_id',patient_id='$patient_id',trx_id='$trx_id',feedback='$feedback' where p_id='$p_id'";
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
