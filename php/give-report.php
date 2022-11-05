<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Give Report</title>
	<link rel="stylesheet" href="../css/testReport.css">
</head>
<body>
    <div style="margin-left:258px;">
    <form method="GET">
        <input type="text" name="username" value="<?php echo $_GET['name']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;margin-left:360px;padding:10px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
      </form>
  </div>
  <br>

 <!-- Back to dashboard    -->
 <?php
if(isset($_GET['Submit'])){
  $name = $_GET['username'];
  header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$name);
}

?>  




<?php
include 'conn.php';
$patient_id = $_GET['id'];
$patient_name = $_GET['name'];

$sql1="SELECT selected_test FROM appoinment where patient_id='$patient_id'";
$query1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($query1);
// echo $row['selected_test'];
$selected_test = $row['selected_test'];

      // string to array conversion
      $coverted_selected_test = explode(',',$selected_test);
      //  print_r($coverted_selected_test);


?>


  <div style=" height:900px;border-radius: 30px; background-color: #f2f2f2; padding: 30px;margin:0px 100px 0px 100px">
	<h2>Report</h2>
	<hr>
	<p>Name : <?php echo $patient_name?></p>
	<p>Ref. By : Self</p>
  <p>Patient ID : <?php echo $patient_id?></p>
	<p>Test Asked : <?php echo $selected_test?></p>
	<hr>
	<table>
  <tr>
    <th>Test Name</th>
    <th>Technology</th>
    <th>Value</th>
    <th>Unit Reference Range</th>
  </tr>
  <tr>
    <td>TOTAL TRIIODOTHYRONINE (T3)</td>
    <td>C.L.I.A</td>
    <td>112</td>
    <td>ng/dl  60-200</td>
  </tr>
  <tr>
    <td>TOTAL THYROXINE (T4)</td>
    <td>C.L.I.A</td>
    <td>5.6</td>
    <td>µg/dl  4.5-12</td>
  </tr>
  <tr>
    <td>THYROID STIMULATING HORMONE(TSH)</td>
    <td>C.L.I.A</td>
    <td>1.99</td>
    <td>µIU/ml  0.3-5.5</td>
  </tr>

</table>
<hr>
<p><strong>Comments : SUGGESTING THYRONORMALCY</strong> </p>
<strong>Please correlate with clinical conditions.
</strong><br><br>
<strong>Method : </strong>
<p>T3 - Competitive Chemi Luminescent Immuno Assay</p>
<p>T4 - Competitive Chemi Luminescent Immuno Assay</p>
<p>TSH - SANDWICH CHEMI LUMINESCENT IMMUNO ASSAY</p>
<p>Pregnancy reference ranges for TSH</p>
<p>1st Trimester : 0.10 - 2.50</p>
<p>2nd Trimester : 0.20 - 3.00</p>
<p>3rd Trimester : 0.30 - 3.00</p>
<strong>Reference : </strong>
<p>Guidelines of American Thyroid Association for the Diagnosis and Management of Thyroid Disease During Pregnancy and Postpartum, Thyroid, 2011, 21; 1-46
</p>
<br>
<h3 class="end"><i>End Report</i></h3>

<!-- <form method="GET">
<input type="text" name="name" value="<?php echo $patient_name?>" hidden>
<input style="margin-left:510px;padding:6px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
</form> -->
</div>
<br>
</body>
</html>