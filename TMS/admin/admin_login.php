<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_POST['adminLogin'])){
        $query="select email,password,name,uid from admins where email='$_POST[email]' AND password='$_POST[Password]'";
        $query_run=mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            while($row=mysqli_fetch_assoc($query_run)){
                $_SESSION['email']=$row['email'];
                $_SESSION['name']=$row['name'];
            }
            echo"<script type='text/javascript'>
            window.location.href='admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo"<script type='text/javascript'>
            alert('Error Please Try Again');
            window.location.href='admin_login.php';
            </script>
            ";
        }
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ETMS</title>
        <script src="..\includes\jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="..\bootstrap-4.0.0-dist\css\bootstrap.min.css">
        <script src="..\bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3>Admin Login</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="Password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="adminLogin" value="Login" class="btn btn-warning"><br>
                </div>
</form>
<center><a href="../index.php" class="btn btn-danger">Go To Home Page</a></center>
</div>
</body>
</html>