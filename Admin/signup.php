<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
<h2>Patient's Information</h2>
<hr>
<br>
    <form id="form4" action="signup.php" method="post">
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
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Repeated Password</th>
                        <th>Agreement</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
   
   <?php
                $sql1="SELECT * FROM signup where s_id='$search' or full_name='%$search%' or email='%$search%' or user_name='%$search%' or password='$search'or repeat_password='$search'or agree='%$search%'";
                // $sql1="SELECT * FROM signup where full_name='$search' or email='$search' or user_name='$search'";
                $query1=mysqli_query($conn,$sql1);
                while($row=mysqli_fetch_array($query1))
                {
                    ?>
                        <tr>
                            <td><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['repeat_password'] ?></td>
                            <td><?php echo $row['agree'] ?></td>
                            <td>
                                <form class="form2" action="signupedit.php" method="post">
                                    <input type="text" name="s_id" value="<?php echo $row['s_id']; ?>" hidden>
                                    <input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" hidden>
                                    <input type="text" name="email" value="<?php echo $row['email']; ?>" hidden>
                                    <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" hidden>
                                    <input type="text" name="password" value="<?php echo $row['password']; ?>" hidden>
                                    <input type="text" name="repeat_password" value="<?php echo $row['repeat_password']; ?>" hidden>
                                    <input type="text" name="agree" value="<?php echo $row['agree']; ?>" hidden>
                                    <button id="button1">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="signup.php" method="post">
                                    <input type="number" name="s_id" value="<?php echo $row['s_id']?>" hidden>
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
            <th>Full Name</th>
            <th>Email</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Repeated Password</th>
            <th>Agreement</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            include 'conn.php';
            $sql="SELECT * FROM signup";
            $query=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $data['s_id'] ?></td>
                        <td><?php echo $data['full_name'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['user_name'] ?></td>
                        <td><?php echo $data['password'] ?></td>
                        <td><?php echo $data['repeat_password'] ?></td>
                        <td><?php echo $data['agree'] ?></td>
                        <td>
                        <form class="form2" action="signupedit.php" method="post">
                       <input type="text" name="s_id" value="<?php echo $data['s_id']; ?>" hidden>
                       <input type="text" name="full_name" value="<?php echo $data['full_name']; ?>" hidden>
                       <input type="text" name="email" value="<?php echo $data['email']; ?>" hidden>
                       <input type="text" name="user_name" value="<?php echo $data['user_name']; ?>" hidden>
                       <input type="text" name="password" value="<?php echo $data['password']; ?>" hidden>
                       <input type="text" name="repeat_password" value="<?php echo $data['repeat_password']; ?>" hidden>
                       <input type="text" name="agree" value="<?php echo $data['agree']; ?>" hidden>
                       <button id="button1">Edit</button>
                </form>
                        </td>
                        <td>
                            <form action="signup.php" method="post">
                            <input type="number" name="s_id" value="<?php echo $data['s_id'] ?>" hidden>
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
            $id=$_POST['s_id'];
            $sql="DELETE from signup where s_id='$id'";
            $query=mysqli_query($conn,$sql);
            if($query){
                ?>
                <p style="text-align:center;">Deleted Successfully</p>; 
                <?php   
            }
            sleep(1);  
            header("Location:{$hostname}/DCMS/db/html/../Admin/signup.php");
    
        }
    ?>
</body>
</html>