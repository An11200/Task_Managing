<?php
    include('includes/connection.php');
    if(isset($_POST['update_task'])){
        $query="update tasks set status='$_POST[status]' where tid=$_GET[id]";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            echo"<script type='text/javascript'>
            alert('Status Updated Succesfully');
            window.location.href='user_dashboard.php';
            </script>
            ";
        }
        else{
            echo"<script type='text/javascript'>
            alert('Error Please Try Again');
            window.location.href='user_dashboard.php';
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
        <script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="row" id="header">
            <div class="col-md-12">
                <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>Task Management System</h3>
</div>
</div>
<div class="row">
    <div class="col-md-4 m-auto" style="color:white;"><br>
        <h3 style="color: white;"> Update Task</h3>
        <?php
            include('includes/connection.php'); 
            $query="select * from tasks where tid=$_GET[id]";
            $query_run=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($query_run)){
                ?>
            <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="status">
                    <option>-Select-</option>
                    <option>In-Progress</option>
                    <option>Complete</option>
            </select>
            </div>
            <input type="submit" class="btn btn-warning" name="update_task" value="Update Task">    
        </form>
        <?php
            }
            ?>
    </div>
</div>
</body>
</html>