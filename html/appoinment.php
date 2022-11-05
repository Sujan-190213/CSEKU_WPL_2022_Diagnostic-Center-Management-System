<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/appoinment.css">

<style>
* {
  box-sizing: border-box;
  
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 5px;
  height: 500px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>
<div class="row" style="background-color: #f2f2f2">

<?php

$conn = mysqli_connect("localhost:3307","root","","diagnostic_center_test");

if(isset($_POST['save'])){
	$code = rand(1,99999);
	$fname = $_POST['fname'];
	$phn = $_POST['phn'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$test = $_POST['testname'];
	$chkstr = implode(",",$test);
	$change_code = "PID_".$code;
    $sql = "INSERT INTO appoinment (`patient_id`,`name`,`phone`,`gender`,`age`,`selected_test`) 
                    VALUES('$change_code','$fname','$phn','$gender','$age','$chkstr')";

	// $sql= "INSERT INTO appointment3 VALUES (`$fname`,`$phn`,`$gender`,`$age`,`$chkstr`)";
	$data = mysqli_query($conn,$sql);
	if($data){
		//echo "Inserted";
		header("Location:{$hostname}/DCMS/db/html/appoinment-response.php?name=".$_POST['fname']."&test=".$chkstr);
		// header("Location:{$hostname}/DCMS/db/html/appoinment-response.php?name=".$_POST['fname']."test=".$_POST['testname']);
	}
	else{
		echo "Not Inserted";
	}
}
?>


<div>
	<form method="GET">
        <input type="text" name="username" value="<?php echo $_GET['user_name']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;margin-left:40px;padding:10px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
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
    <form method="POST">
        <fieldset>	
            <h1 class="header">Request An Appoinment</h1>
            <img src="../resource/appointment.png" style="border-radius: 40px;"><br>
            <hr>
            <div class="column" style="background-color: #b5c4c5;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <label for="fname">Name </label>
                <input type="text" placeholder=" Patient Name" name="fname" style="background-color: #f2f2f2;" required>
                <br>
                <br>
                <label for="phone">Phone </label>
                <input type="text" placeholder="(000) 000-0000-000" name="phn" style="background-color: #f2f2f2;" required>
                <br>
                <br>
                <label for="gender">Gender</label>
                <input type="radio" value="Male" name="gender" checked required> Male   
                <input type="radio" value="Female" name="gender" required> Female   
                <input type="radio" value="Other" name="gender" required> Other  
                <br>
                <br>
                <label for="age">Age</label>
                <input type="text" name="age" style="background-color: #f2f2f2;" required>
                <br><br>
            </div>
            <div class="column" style="background-color:#00ffff;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>Choose Your Tests</h2>
            <div style="text-align: left; margin-left: 190px">
            <table class="table table-bordered">
	<thead>
		<tr>
			<th>Tests</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="Amylase Test">Amylase Test
			</td>
			<td><input type="number" name="test_price[]" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="220.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="Blood Sugar Test">Blood Sugar Test
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="180.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="CT Scans">CT Scans
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="5500.00"></td>
		</tr>
        <tr>
			<td>
				<input type="checkbox" name="testname[]" value="CBC (Complete Blood Count)">CBC (Complete Blood Count)
			</td>
			<td><input type="number" name="test_price[]" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="400.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="CRP (C – Reactive protein)">CRP (C – Reactive protein)
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="485.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="Hemoglobin A1C (HbA1c)">Hemoglobin A1C (HbA1c)
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="400.00"></td>
		</tr>
        <tr>
			<td>
				<input type="checkbox" name="testname[]" value="MRI Scans">MRI Scans
			</td>
			<td><input type="number" name="test_price[]" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="4000.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="PET Scan">PET Scan
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="30000.00"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="testname[]" value="Thyroid Function test – TSH T3 and T4">Thyroid Function test – TSH T3 and T4
			</td>
			<td><input type="number" name="test_price[]" class="form-control" style="background-color: #f2f2f2; color: blue; font-weight: bold; padding: 3px" value="8800.00"></td>
		</tr>
	</tbody>
</table>
<br /><br />
            </div>
            </div>
            <input type="submit" name="save" value="Submit" style="padding: 10px 50px 10px 50px; margin: 10px"/>
        </fieldset>        
    </form>
</div>
</body>
</html>