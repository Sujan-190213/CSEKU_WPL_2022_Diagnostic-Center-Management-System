<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <style>
        body{
            background-color:lavender;

        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 360px;
            background: #99ffe7;
            width:1000px;
        }
        th,td{
            border: 1px solid black;
            padding: 7px;
        }
        h2{
            text-align: center;
            color:green;
        }

        #form1{
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 20px;

        }
        div{
            margin-left: 20px; 
            height:50px;
        }
        #form1{
            width:1100px;
            margin-left:300px;
        }
        #form4{
                margin-left:650px;
        }

        input{
            background-color:white;
        }
        .blue{
            background: pink;
        }
    </style>
</head>
<body>
<button><a href="homepage_admin.php" style="text-decoration: none">Go Back Home</a></button>
<h2>Appointment Information</h2>
<hr>
<br>
    <form id="form4" action="appointment.php" method="post">
        <input id="search" type="text" name="search1" placeholder="Search Something..." required>
        <button name="search">Search</button>
    </form>
    <br>

    <table>
    <?php
            include ('conn.php');
            if(isset($_POST['search'])){
                $search=$_POST['search1'];
                ?>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient ID</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Selected Test</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
   
   <?php
                
                $sql1="SELECT * FROM appoinment where appointment_id='$search' or patient_id='$search' or name='$search' or phone='$search'or gender='$search'or age='$search'or selected_test='$search'";
                $query1=mysqli_query($conn,$sql1);
                while($row=mysqli_fetch_array($query1))
                {
                    ?>
                        <tr>
                            <td><?php echo $row['appointment_id'] ?></td>
                            <td><?php echo $row['patient_id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['selected_test'] ?></td>
                            <td>
                                <form class="form2" action="appointmentedit.php" method="post">
                                    <input type="text" name="appointment_id" value="<?php echo $row['appointment_id']; ?>" hidden>
                                    <input type="text" name="patient_id" value="<?php echo $row['patient_id']; ?>" hidden>
                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" hidden>
                                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" hidden>
                                    <input type="text" name="gender" value="<?php echo $row['gender']; ?>" hidden>
                                    <input type="text" name="age" value="<?php echo $row['age']; ?>" hidden>
                                    <input type="text" name="selected_test" value="<?php echo $row['selected_test']; ?>" hidden>
                                    <button id="button1">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="appointment.php" method="post">
                                    <input type="number" name="appointment_id" value="<?php echo $row['appointment_id'] ?>" hidden>
                                    <input type="submit" name="delete" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php 
                }
            }
    ?>
    </table>
    <br>

    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Selected Test</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include 'conn.php';
            $sql="SELECT * FROM appoinment";
            $query=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $data['appointment_id'] ?></td>
                        <td><?php echo $data['patient_id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['phone'] ?></td>
                        <td><?php echo $data['gender'] ?></td>
                        <td><?php echo $data['age'] ?></td>
                        <td><?php echo $data['selected_test'] ?></td>
                        <td>
                        <form class="form2" action="appointmentedit.php" method="post">
                       <input type="text" name="appointment_id" value="<?php echo $data['appointment_id']; ?>" hidden>
                       <input type="text" name="patient_id" value="<?php echo $data['patient_id']; ?>" hidden>
                       <input type="text" name="name" value="<?php echo $data['name']; ?>" hidden>
                       <input type="text" name="phone" value="<?php echo $data['phone']; ?>" hidden>
                       <input type="text" name="gender" value="<?php echo $data['gender']; ?>" hidden>
                       <input type="text" name="age" value="<?php echo $data['age']; ?>" hidden>
                       <input type="text" name="selected_test" value="<?php echo $data['selected_test']; ?>" hidden>
                       <button id="button1">Edit</button>
                </form>
                        </td>
                        <td>
                            <form action="appointment.php" method="post">
                            <input type="number" name="appointment_id" value="<?php echo $data['appointment_id'] ?>" hidden>
                            <input type="submit" name="delete" value="Delete">
                            </form>
                        </td>

                    </tr>
                <?php 
            }

        ?>
    </table>
    <?php
        include ('conn.php');
        error_reporting(0);
        if(isset($_POST['delete']))
        {
            $id=$_POST['appointment_id'];
            $sql="DELETE from appoinment where appointment_id='$id'";
            $query=mysqli_query($conn,$sql);
            if($query){
                ?>
                <p style="text-align:center;">Deleted Successfully</p>; 
                <?php   
            }
            sleep(1);  
            header("Location:{$hostname}/DCMS/db/html/../Admin/appointment.php");
    
        }
    ?>
</body>
</html>