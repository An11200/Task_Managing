<?php
    include('../includes/connection.php');
    if(isset($_POST['edit_task'])){
        $query="update tasks set uid=$_POST[id], description='$_POST[description]', start_date='$_POST[start_date]', end_date='$_POST[end_date]' where tid=$_GET[id]";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            echo"<script type='text/javascript'>
            alert('Task Updated Succesfully');
            window.location.href='admin_dashboard.php';
            </script>
            ";
        }
        else{
            echo"<script type='text/javascript'>
            alert('Error Please Try Again');
            window.location.href='admin_dashboard.php';
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
        <link rel="stylesheet" type="text/css" href="..\bootstrap-4.0.0-dist\css\bootstrap.min.css">
        <script src="..\bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <div class="row" id="header">
            <div class="col-md-12">
                <h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>Task Management System</h3>
</div>
</div>
<div class="row">
    <div class="col-md-4 m-auto" style="color:white;"><br>
        <h3 style="color: white;"> Edit Task</h3>
        <?php
            include('../includes/connection.php'); 
            $query="select * from tasks where tid=$_GET[id]";
            $query_run=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($query_run)){
                ?>
            <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label>Select User:</label>
                <select class="form-control" name="id" required>
                    <option>-Select-</option>
                    <?php
                        include('../includes/connection.php');
                        $query1="select uid,name from user";
                        $query_run1=mysqli_query($connection,$query1);
                        if(mysqli_num_rows($query_run1)){
                            while($row1=mysqli_fetch_assoc($query_run1)){
                            ?>
                            <option value="<?php echo $row1['uid'];?>"
                            ><?php echo $row1['name'];?></option>
                            <?php
                        }
                    }
                    ?>
                </select> 
            </div>
            <div class="form-group">
            <label>Description:</label>
                <textarea class="form-control" rows="3" cols="50" name="description" required><?php echo $row['Description'];?></textarea>
            </div>
            <div class="form-group">
                <label>Start Date:</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo $row['Start_date'];?>" required>
            </div>  
            <div class="form-group">
                <label>End Date:</label>
                <input type="date" class="form-control" name="end_date" value="<?php echo $row['End_date'];?>" required>
            </div>  
            <input type="submit" class="btn btn-warning" name="edit_task" value="Update Task">    
        </form>
        <?php
            }
            ?>
    </div>
</div>
</body>
</html>