<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Memo Response</title>
    <link rel="stylesheet" href="../css/feedback.css" />
  </head>
  <body>
  <div style="margin-left:700px;margin-top:10px;">
      <button style="padding:10px 30px 10px 30px;border-radius:20px;">
        <a href="homePage.php" style="text-align: center; padding: 15px; text-decoration: none">Home</a>
      </button>
    </div>
    <br />
<?php
$conn = mysqli_connect("localhost:3307","root","","diagnostic_center_test") or die("Connection Failed");
$patient_name = $_GET['name'];
$patient_id = $_GET['id'];

$sql = "SELECT selected_test FROM appoinment WHERE patient_id='$patient_id'";
  $query1=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($query1);
 $test_name =  $row['selected_test'];


?>


<?php

$name = $_GET['name'];
 // echo $name;
if(isset($_GET['Submit'])){
  header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$name);
}

?>


<!-- price calculation -->
<?php

// echo $test_name;
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

?>


<div style="border-radius: 25px; background-color: #f2f2f2; padding: 50px;margin:0px 300px 0px 300px ;">
      <form>
        <fieldset>
          <legend><h1 style="margin-top:0px;">Cash Memo</h1></legend>
          <h2 class="pid">Patient ID : <?php echo $patient_id ?></h2>
          <h2 class="pid">Patient Name : <?php echo $patient_name ?></h2>
          <h2 class="sTest">Selected Test</h2>
<?php
    //  string to array conversion
     // $test_name = explode(',',$test_name);
     for($i = 0;$i < count($test_name);$i++){
        echo "<input type='checkbox' checked />";
        echo $test_name[$i] ."<br />";
     }
?>

          <span style="font-size:30px">----------------------------------------</span>
          <br /><br />

          <h2>Amount Paid : ৳<?php echo $sum;?>.00</h2>
          <h2>Amount Due: ৳0.00</h2>
          <h1 class="end">Thanks :)</h1>
        </fieldset>
      </form>

      <form method="GET">
        <input type="text" name="name" value="<?php echo $patient_name?>" hidden>
        <input style="margin-left:310px;margin-top:20px;padding:6px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
      </form>
    </div>
  </body>
</html>
