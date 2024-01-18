<?php
    include('includes/connection.php');
    if(isset($_POST['userLogin'])){
        $query="insert into user values(null,'$_POST[name]','$_POST[email]','$_POST[Mobile]','$_POST[Password]')";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            echo"<script type='text/javascript'>
            alert('User Registration Succesful');
            window.location.href='index.php';
            </script>
            ";
        }
        else{
            echo"<script type='text/javascript'>
            alert('Error Please Try Again');
            window.location.href='register.php';
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
        <script src="C:\xampp\htdocs\TMS\includes\jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
        <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="registration_home_page">
            <center><h3>User Registration</h3></center>
            <form action="" method="post">
            <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="Mobile" class="form-control" placeholder="Enter Phone No." required>
                </div>
                <div class="form-group">
                    <input type="password" name="Password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="userLogin" value="Register" class="btn btn-warning"><br>
                </div>
</form>
<center><a href="index.php" class="btn btn-danger">Go To Home Page</a></center>
</div>
</body>
</html>