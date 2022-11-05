<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Appoinment Response</title>
    <link rel="stylesheet" href="../css/testinformation.css" />
  </head>
  <body>
    <!-- <div style="margin-left:400px;">
      <button>
        <a href="homePage.php" style="text-align: left; padding: 15px; text-decoration: none;">Home</a>
      </button>
    </div> -->

    <div style="margin-left:600px;">
      <!-- <button style="padding:10px 30px 10px 30px;border-radius:20px;">
        <a href="homePage.php" style="text-align: center; padding: 15px; text-decoration: none">Home</a>
      </button> -->
      <form method="GET">
        <input type="text" name="username" value="<?php echo $_GET['name']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;margin-left:40px;padding:10px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
    </form>
    </div>
    <br />

 <!-- Back to dashboard    -->
 <?php
if(isset($_GET['Submit'])){
  $name = $_GET['username'];
  header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$name);
}

?>  
 
    <?php

      $test_name = $_GET['test'];
      $sum=0.00;
      // string to array conversion
      $test_name = explode(',',$test_name);
      // print_r($test_name);

      foreach($test_name as $v){
        // echo($v)."<br>";    // Value1, Value2, Value10
        if($v == "Amylase Test"){
          $test_price = 220.00;
          $sum = $sum + $test_price;
        }
        elseif($v == "Blood Sugar Test"){
          $test_price=180.00;
          $sum = $sum + $test_price;
        }
        elseif($v == "CT Scans"){
          $test_price=5500.00;
          $sum = $sum + $test_price;
        }

        elseif($v == "CBC (Complete Blood Count)"){
          $test_price=400.00;
          $sum = $sum + $test_price;
        }

        elseif($v == "CRP (C – Reactive protein)"){
          $test_price=485.00;
          $sum = $sum + $test_price;
        }

        elseif($v == "Hemoglobin A1C (HbA1c)"){
          $test_price=400.00;
          $sum = $sum + $test_price;
        }

        elseif($v == "MRI Scans"){
          $test_price=4000.00;
          $sum = $sum + $test_price;
        }
        elseif($v == "PET Scan"){
          $test_price=30000.00;
          $sum = $sum + $test_price;
        }
        elseif($v == "Thyroid Function test – TSH, T3 and T4"){
          $test_price=8800.00;
          $sum = $sum + $test_price;
        }


     }


      // for($i = 0;$i < count($test_name);$i++)
	    //       echo $test_name[$i]."<br>";
      //       // if($test_name[$i] === "Amylase Test"){
      //       //   $test_price = 200.00;
      //       //   echo $test_price;
      //       // }
      ?>




<?php
include 'conn.php';
$name = $_GET['name'];
$test = $_GET['test'];

$sql1="SELECT patient_id FROM appoinment where name='$name' and selected_test='$test'";
$query1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($query1);
// echo $row['patient_id'];
?>

    <div style=" height: 350px; border-radius: 30px; background-color: #f2f2f2; padding: 20px;margin:0px 290px 0px 290px;">
      <div>
        <h1 style="text-align: center;">Appoinment Submitted!!</h1>
      </div>
      <table>
        <tr>
        <th style="color:blue;font-size:20px">Patient Name: </th>
        <td style="font-size:20px"><?php echo $_GET['name'];?></td>
        </tr>
        <tr>
        <th style="color:blue;font-size:20px">Selected Test:</th>
        <td style="font-size:20px"><?php echo $_GET['test']; ?></td>
        </tr>
        <tr>
        <th style="color:blue;font-size:20px">Amount to Pay:</th>
        <td style="font-size:20px"><?php echo $sum; ?>.00</td>
        </tr>
        <tr>
          <br>
          <th style="color:red;font-size:20px; padding:15px">Your Patient ID is: </th>
          <td style="font-size:20px "><?php echo $row['patient_id']; ?></td>
       
        </tr>

        <tr>
          <th>
            <br>
            <br>
    <form method="GET">
        <input type="text" name="name" value="<?php echo $_GET['name']?>" hidden>
        <input type="text" name="test" value="<?php echo $_GET['test']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;margin-left:40px;padding:10px;color:blue;font-weight:bold;" type="submit" name="goto-payment" value="Please Pay">
    </form>
    
 <!-- Goto Payment page   -->
 <?php
if(isset($_GET['goto-payment'])){
  $name = $_GET['name'];
  $test= $_GET['test'];
  header("Location:{$hostname}/DCMS/db/html/payment.php?name=".$name."&test=".$test);
  
}
?>

          </th>
        </tr>
      </table>
    </div>
  </body>
</html>
