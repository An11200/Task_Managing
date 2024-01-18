<?php
 session_start();
 include('includes/connection.php');
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
    <center><h3>Your Tasks</h3></center><br>
    <table class="table" style="background-color: black; width: 75vw;">
    <tr>
        <th>S.No</th>
        <th>Task ID</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
        $query="select * from tasks where uid= $_SESSION[uid]";
        $query_run=mysqli_query($connection,$query);
        $sno=1;
        while($row=mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row['TID'];?></td>
                <td><?php echo $row['Description'];?></td>
                <td><?php echo $row['Start_date'];?></td>
                <td><?php echo $row['End_date'];?></td>
                <td><?php echo $row['Status'];?></td>
                <td><a href="update_status.php?id=<?php echo $row['TID'];?>">Update</a></td>
            </tr>
            <?php
            $sno++;
        }
    ?>
</table>
</body>
</html>