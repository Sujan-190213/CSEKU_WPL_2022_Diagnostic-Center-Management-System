<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient's Task</title>
  </head>

  <style>
    .sn {
      text-align: center;
      padding: 75px;
      margin-top: 45px;
    }



    button {
      background-color: #4caf50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .m{
      background-color:blue;
      color:white;
      border-radius:30px;
    }

    .btn1 {
      font-size: 30px;
      text-transform: uppercase;
      text-align: center;
      background-color: brown;
    }

    .btn2 {
      font-size: 30px;
      text-transform: uppercase;
      text-align: center;
      background-color: rgb(153, 117, 0);
    }
  </style>

  <body>
    <br><br>
    <div style='margin: 0px 670px 0px 670px;'>
      <button class="m">
        <a href="homePage.php" style="text-decoration: none;color:white;">Back To Home</a
        >
      </button>
    </div>
   <br>
    
    <!-- Login with session -->
<?php
  session_start();
  if($_SESSION['patient']!=true)
  {
    header('location: logInForPatient.php');
  }
  if(isset($_POST['logout']))
  {
    session_unset();
    session_destroy();
    header("location: logInForPatient.php");
  }
  ?>


    <?php
      $user_name = $_GET['user_name'];
      // echo $user_name;
      $pass_username = $user_name;

      if(isset($_POST['appoinment'])){
        header("Location:{$hostname}/DCMS/db/html/appoinment.php?user_name=$pass_username");
      }

?>



<?php
      $user_name = $_GET['user_name'];
      // echo $user_name;
      $pass_username = $user_name;

      if(isset($_POST['see-report'])){
        header("Location:{$hostname}/DCMS/db/html/report-response.php?user_name=$pass_username");
      }

?>


<?php
      $user_name = $_GET['user_name'];
      // echo $user_name;
      $pass_username = $user_name;

      if(isset($_POST['cash-memo'])){
        header("Location:{$hostname}/DCMS/db/html/cash-memo.php?user_name=$pass_username");
      }

?>


    <div style="border-radius: 35px; background-color: #f2f2f2; padding: 20px;margin:0px 250px 0px 250px">
      <div class="sn" style="margin-top:10px;">
        <div class="clearfix1">
          <form action="" method="POST">
            <button type="submit" name="appoinment" class="btn1">Request an Appoinment</button>
          </form>

          <!-- <form action="giveTestResult.html" method="POST">
            <button type="submit" class="btn2">See Report</button>
          </form> -->

          <form action="" method="POST">
            <button type="submit" name="see-report" class="btn2">See Report</button>
          </form>
        </div>
        <div class="clearfix2"></div>
          <form method="POST">
            <button type="submit" name="cash-memo" class="btn1">Cash Memo</button>
          </form>
        </div>
      </div>
    </div>
<br>
    <div style='margin: 0px 670px 0px 670px;'>
      <form action="patient-perform.php" method="post">
        <button name="logout" style="border-radius:30px;">Log out</button>
      </button>
    </form>
  </body>
</html>
