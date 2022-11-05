<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Response</title>
    <link rel="stylesheet" href="../css/testinformation.css" />
  </head>
  <body>
    <div>
      <!-- <button style="margin-left:700px;padding:10px 20px 10px 20px;border-radius:30px;">
        <a href="homePage.php" style="padding: 15px; text-decoration: none">Home</a>
      </button>
    </div> -->
    <br /><br><br>

    <div style=" height:400px; width:auto; margin:0 290px 0 290px; border-radius: 30px; background-color: #f2f2f2; padding: 20px;">
      <div>
        <br>
        <br>
        <br>
        <h1 style="text-align: center;">Payment Confirmation is on Pending...</h1>
        <h2 style="text-align: center;">Please wait a bit for Admin Confirmation.</h2>
        <h3 style="text-align: center;">Reload this current. Thanks :)</h3>
<br>
<?php
$conn = mysqli_connect("localhost:3307","root","","diagnostic_center_test");

$p_id = $_GET['p_id'];
$feed = "";

$sql1 = "SELECT feedback FROM payment WHERE patient_id='$p_id'";
$query1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($query1);
if($row['feedback'] === "complete"){
    $feed = "Payment Successful!!";
}

$sql2 = "SELECT name FROM appoinment WHERE patient_id='$p_id'";
$query2=mysqli_query($conn,$sql2);
  $row = mysqli_fetch_assoc($query2);
  $name = $row['name'];
// echo $name;
?>

<?php
$name = $name;
if(isset($_GET['Submit'])){
  $name = $_GET['name'];
  header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$name);
}

?>



<p style="font-size:25px;margin-left:330px;color:green;font-weight:bold;"><?php echo $feed ?></p>

<form method="GET">
<input type="text" name="name" value="<?php echo $name?>" hidden>
<input style="margin-left:360px;padding:6px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
</form>

</div>
    </div>
  </body>
</html>
