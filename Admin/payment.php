<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Handle</title>
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
<h2>Payment Handle</h2>
<hr>
<br>
    <form id="form4" action="payment.php" method="post">
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
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Transaction ID</th>
                        <th>Feedback</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
   
   <?php
                
                $sql1="SELECT * FROM payment where p_id='$search' or patient_id='$search' or trx_id='$search' or feedback='$search'";
                $query1=mysqli_query($conn,$sql1);
                while($row=mysqli_fetch_array($query1))
                {
                    ?>
                        <tr>
                            <td><?php echo $row['p_id'] ?></td>
                            <td><?php echo $row['patient_id'] ?></td>
                            <td><?php echo $row['trx_id'] ?></td>
                            <td><?php echo $row['feedback'] ?></td>
                            <td>
                                <form class="form2" action="paymentedit.php" method="post">
                                    <input type="text" name="p_id" value="<?php echo $row['p_id']; ?>" hidden>
                                    <input type="text" name="patient_id" value="<?php echo $row['patient_id']; ?>" hidden>
                                    <input type="text" name="trx_id" value="<?php echo $row['trx_id']; ?>" hidden>
                                    <input type="text" name="feedback" value="<?php echo $row['feedback']; ?>" hidden>
                                    <button id="button1">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="payment.php" method="post">
                                    <input type="number" name="p_id" value="<?php echo $row['p_id'] ?>" hidden>
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
            <th>ID</th>
            <th>Patient ID</th>
            <th>Transaction ID</th>
            <th>Feedback</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include 'conn.php';
            $sql="SELECT * FROM payment";
            $query=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $data['p_id'] ?></td>
                        <td><?php echo $data['patient_id'] ?></td>
                        <td><?php echo $data['trx_id'] ?></td>
                        <td><?php echo $data['feedback'] ?></td>
                        <td>
                        <form class="form2" action="paymentedit.php" method="post">
                       <input type="text" name="p_id" value="<?php echo $data['p_id']; ?>" hidden>
                       <input type="text" name="patient_id" value="<?php echo $data['patient_id']; ?>" hidden>
                       <input type="text" name="trx_id" value="<?php echo $data['trx_id']; ?>" hidden>
                       <input type="text" name="feedback" value="<?php echo $data['feedback']; ?>" hidden>
                       <button id="button1">Edit</button>
                </form>
                        </td>
                        <td>
                            <form action="payment.php" method="post">
                            <input type="number" name="p_id" value="<?php echo $data['p_id'] ?>" hidden>
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
            $id=$_POST['p_id'];
            $sql="DELETE from payment where p_id='$id'";
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