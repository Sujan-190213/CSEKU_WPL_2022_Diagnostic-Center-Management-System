<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Handle</title>
    <style>
        body{
            background-color:lavender;

        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 300px;
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
<h2>Contact Us Handle</h2>
<hr>
<br>

    <table>
    <?php
            include ('conn.php');
            if(isset($_POST['search'])){
                $search=$_POST['search1'];
                ?>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
   
   <?php
                
                $sql1="SELECT * FROM contact where id='$search' name='$search' or email='$search' or phone='$search' or message='$search'";
                $query1=mysqli_query($conn,$sql1);
                while($row=mysqli_fetch_array($query1))
                {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <td>
                                <form action="contact-us.php" method="post">
                                    <input type="number" name="id" value="<?php echo $row['id'] ?>" hidden>
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Delete</th>
        </tr>
        <?php 
            include 'conn.php';
            $sql="SELECT * FROM contact";
            $query=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['phone'] ?></td>
                        <td><?php echo $data['message'] ?></td>
                        <td>
                            <form action="contact-us.php" method="post">
                            <input type="number" name="id" value="<?php echo $data['id'] ?>" hidden>
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
            $id=$_POST['id'];
            $sql="DELETE from contact where id='$id'";
            $query=mysqli_query($conn,$sql);
            if($query){
                ?>
                <p style="text-align:center;">Deleted Successfully</p>; 
                <?php   
            }
            sleep(1);  
            header("Location:{$hostname}/DCMS/db/html/../Admin/contact-us.php");
    
        }
    ?>
</body>
</html>