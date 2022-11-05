<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test Edit</title>
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
      #form1{
            width:1100px;
            margin-left:300px;
        }
        #form4{
                margin-left:650px;
                border:none;
        }
    </style>
  </head>
  <body>
    <a href="test_information.php">Home</a>
    <?php
    ?>
     <form class="form2" action="test_informationedit.php" method="post">
                        <label for="">Test ID</label><br>
                       <input type="text" name="test_id" value="<?php echo $_POST['test_id']; ?>" > <br>
                       <label for="">Test Name</label> <br>
                       <input type="text" name="test_name" value="<?php echo $_POST['test_name']; ?>" > <br>
                       <label for="">Test Price</label> <br>
                       <input type="text" name="test_price" value="<?php echo $_POST['test_price']; ?>" ><br>
                       <input type="submit" name="update" value="Update">
      </form>
     <?php
     include 'conn.php';
     if (isset($_POST['update'])) {
        $test_id=$_POST['test_id'];
        $test_name=$_POST['test_name'];
        $test_price=$_POST['test_price'];

       $sql5="UPDATE test_information SET test_id='test_id',test_name='$test_name',test_price='$test_price' where test_id='$test_id'";
       $query5=mysqli_query($conn,$sql5);

       if($query5){
         ?>
              <p style="margin-left:600px; color:blue;">
               Updated Successfully
              </p>
         <?php
       }
      //  sleep(1);
      //  header("Location:test_information.php");
     }

     ?>

  </body>
</html>
