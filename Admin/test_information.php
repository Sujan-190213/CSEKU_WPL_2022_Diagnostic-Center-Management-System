<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 460px;
            background: #99ffe7;
        }
        th,td{
            border: 1px solid black;
            padding: 7px;
        }
        h2{
            text-align: center;
            color:green;
        }

        form{
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
                border:none;
        }
    </style>
</head>
<body>
<button><a href="homepage_admin.php" style="text-decoration: none">Go Back Home</a></button>
    <h2>Test Information</h2>
    <hr>
    <br>
    <form id="form0" action="test_information.php" method="post" style="border: none;margin-left:530px">
        <input type="text" placeholder="Test Name" name="test_name" required>
        <input type="text" placeholder="Test Price" name="test_price" required>
        <button name="add">Add to Test</button>
    </form>
    <?php
            include 'conn.php';
            if(isset($_POST['add'])){
            $test_name = $_POST['test_name'];
            $test_price = $_POST['test_price'];

            $sql0 = "INSERT INTO test_information (test_name, test_price) VALUES ('$test_name', '$test_price')";
            $query1=mysqli_query($conn,$sql0);
            }


    ?>


<br>
<br>
    <form id="form4" action="test_information.php" method="post">
        <input id="search" type="text" name="search1" placeholder="Search Something..." required>
        <button name="search">Search</button>
    </form>
    <br>
    <table>
    <?php
            include 'conn.php';
            if(isset($_POST['search'])){
                $search=$_POST['search1'];
                ?>
            <tr>
            <th>Test ID</th>
            <th>Test Name</th>
            <th>Test Price</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
                <?php
                $sql1="SELECT * FROM test_information where test_id='$search' or test_name='$ search' or test_price='$search'";
                $query1=mysqli_query($conn,$sql1);
                while($row=mysqli_fetch_array($query1))
                {
                    ?>
                        <tr>
                            <td><?php echo $row['test_id'] ?></td>
                            <td><?php echo $row['test_name'] ?></td>
                            <td><?php echo $row['test_price'] ?></td>
                            <td>
                <form class="form2" action="test_informationedit.php" method="post">
                  <input type="text" name="test_id" value="<?php echo $row['test_id']; ?>" hidden>
                  <input type="text" name="test_name" value="<?php echo $row['test_name']; ?>" hidden>
                  <input type="text" name="test_price" value="<?php echo $row['test_price']; ?>" hidden>
                  <button id="button1">Edit</button>
                </form>
                </td>
                <td>
                <form action="test_information.php" method="post">
                    <input type="text" name="test_id" value="<?php echo $row['test_id'] ?>" hidden>
                    <input type="submit" name="delete" value="Delete">
                </form>
                </td>
                 </tr>
                    <?php 
                }
            }
    ?>
    </table>
    <br><br>
    <table>
        <tr>
            <th>Test ID</th>
            <th>Test Name</th>
            <th>Test Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include 'conn.php';
            $sql="SELECT * FROM test_information";
            $query=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $data['test_id'] ?></td>
                        <td><?php echo $data['test_name'] ?></td>
                        <td><?php echo $data['test_price'] ?></td>
                        <td>
                <form class="form2" action="test_informationedit.php" method="post">
                  <input type="text" name="test_id" value="<?php echo $data['test_id']; ?>" hidden>
                  <input type="text" name="test_name" value="<?php echo $data['test_name']; ?>" hidden>
                  <input type="text" name="test_price" value="<?php echo $data['test_price']; ?>" hidden>
                  <button id="button1">Edit</button>
                </form>
                </td>
                        <td>
                        <form action="test_information.php" method="post">
                            <input type="number" name="test_id" value="<?php echo $data['test_id'] ?>" hidden>
                            <input type="submit" name="delete" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php 
            }

        ?>
    </table>
    <?php
        include 'conn.php';
        error_reporting(0);
        if(isset($_POST['delete']))
        {
            $id=$_POST['test_id'];
            $sql="DELETE from test_information where test_id='$id'";
            $query=mysqli_query($conn,$sql);
            
            if($query){
                ?>
                <p style="margin-left:520px;color:red;">Deleted Successfully</p>; 
                <?php   
            }
            sleep(1);  
            header("Location:{$hostname}/DCMS/db/html/../Admin/test_information.php");
        }
    ?>
</body>
</html>