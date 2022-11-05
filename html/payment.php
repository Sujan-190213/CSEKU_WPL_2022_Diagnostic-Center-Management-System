<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/payment.css">
</head>
<body>
<body>
<div style="margin-left:700px;">
    <form method="GET">
        <input type="text" name="name" value="<?php echo $_GET['name']?>" hidden>
        <input type="text" name="test" value="<?php echo $_GET['test']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;padding:10px;color:blue;font-weight:bold;" type="submit" name="goto-payment" value="Back to Previous">
    </form>

 <!-- Goto Back   -->
 <?php
if(isset($_GET['goto-payment'])){
  $name = $_GET['name'];
  $test= $_GET['test'];
  header("Location:{$hostname}/DCMS/db/html/appoinment-response.php?name=".$name."&test=".$test);
  
}
?>




    </div>
   
	<br>
	<div  style="border-radius: 45px;background-color: #f2f2f2;padding: 60px;margin:5px 250px 40px 250px;">
	
	<?php
	$conn = mysqli_connect("localhost:3307","root","","diagnostic_center_test");

if(isset($_POST['save'])){
	$PatientID = $_POST['PatientID'];
	$TrxID = $_POST['TrxID'];

	$sql = "INSERT INTO payment (patient_id, trx_id) VALUES('$PatientID', '$TrxID')";
	$data = mysqli_query($conn,$sql);


	if($data){
		//echo "Inserted";
		header("Location:{$hostname}/DCMS/db/html/payment-response.php?p_id=".$_POST['PatientID']);
		// header("Location:{$hostname}/DCMS/db/html/appoinment-response.php?name=".$_POST['fname']."test=".$_POST['testname']);
	}
	else{
		echo "Not Inserted";
	}
}

    ?>
	
	
	<form method="POST">
		<fieldset>
			<legend><h1>Payment</h1></legend>
			<img src="../resource/payment.jpg" alt="" style="height:230px; width:auto; border-radius: 20px;"><br>
			<div>
			<h3 style="color:red;">bKash Transfer</h3>
			<img class="image" src="../resource/bkash.svg" alt="">
			</div>
			<br><br>
			<span style="font-size: 25px">bKash Personal Number : 01757405814</span>
			<br><br>
			<div>
			<h3 style="color:red;">Roket Transfer</h3><br><br>
			<img class="image" src="../resource/roket.png" style="border-radius:20px" alt="">
			<br><br>
			<span style="font-size: 25px">Roket Personal Number : 01922262439</span>
			</div>
			<br>
			<span>PatientID : </span>
			<input type="text" name="PatientID">
			<br><br>
			<span>TrxID : </span>
			<input type="text" name="TrxID">
			<!-- <button><a href="feedback.html">Send</a></button> -->
			<input type="submit" name="save" value="Send" style="margin-left:10px;padding: 7px; border-radius: 6px;"/>
		</fieldset>
	</form>
	</div>
</body>
</html>