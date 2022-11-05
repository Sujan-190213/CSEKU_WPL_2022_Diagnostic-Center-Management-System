<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report Response</title>
    <link rel="stylesheet" href="../css/testinformation.css" />
  </head>
  <body>
    <br>
    <div style="margin-left:650px;">
      <!-- <button style="padding:10px 30px 10px 30px;border-radius:20px;">
        <a href="homePage.php" style="text-align: center; padding: 15px; text-decoration: none">Home</a>
      </button> -->
      <form method="GET">
        <input type="text" name="name" value="<?php echo $_GET['user_name']?>" hidden>
        <input style="cursor:pointer;border-radius: 10px;padding:10px;color:blue;font-weight:bold;" type="submit" name="Submit" value="Back To Patient Dashboard">
      </form>

  <!-- Back to dashboard    -->
  <?php
$name = $_GET['user_name'];
if(isset($_GET['Submit'])){
  $name = $_GET['name'];
  header("Location:{$hostname}/DCMS/db/html/patient-perform.php?user_name=".$name);
}

?>
    </div>
    <br />
    <br>

    <?php
// $conn = mysqli_connect("localhost:3307","root","","diagnostic_center_test") or die("Connection Failed");
$pass_user_name = $_GET['user_name'];
// echo $pass_user_name;
if(isset($_GET['submit'])){
  $patient_id = $_GET['patient_id'];
  $patient_name =$_GET['patient_name'];
//   $sql = "SELECT patient_id, patient_name from appoinment WHERE patient_name='$pass_user_name' and patient_id='$patient_id'";
//   $query1=mysqli_query($conn,$sql1);
//  $row=mysqli_fetch_array($query1);
// echo $row['patient_id'];
  
  header("Location:{$hostname}/DCMS/db/html/cash-memo-response.php?id=".$_GET['patient_id']."&name=".$_GET['patient_name']);

}


?>


    <div style=" height:400px;border-radius: 40px; background-color: #f2f2f2; padding: 40px;margin:0px 470px 0px 470px">
    <h1>Hi, <input type="text" value="<?php echo $pass_user_name?>" name="patient_name" style="background-color: #f2f2f2; border:none;display:inline;font-size:20px"> </h1>
    <div>
        <h2 style="align:center; color:blue; margin-left:100px">Please Provides Information Below</h2>
        <br><br>


        <form method="GET">
            <label for="patient_id">Patient ID: </label>
            <input type="text" placeholder="Patient ID" name="patient_id" required>
            <br><br>
            <label for="patient_name">Patient's Name: </label>
            <input type="text" placeholder="Patient Name" name="patient_name" required>
            <br><br>
            <br>
            <input type="submit" value="Submit" name="submit" style="margin-left:210px;padding:10px 15px 10px 15px;border-radius:10px;">
        </form>
        <br>
        <h2 style="text-align: center;">Thanks :)</h2>
      </div>
    </div>
  </body>
</html>
