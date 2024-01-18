<?php
session_start();
if (isset($_SESSION['email'])){
include('includes/connection.php');

if (isset($_POST['submit_leave'])) {
    $uid = $_SESSION['uid'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO leaves (uid, subject, message, status) VALUES ('$uid', '$subject', '$message', 'No Action')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "<script type='text/javascript'>
        alert('Leave Applied Successfully');
        window.location.href='user_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error. Please Try Again');
        window.location.href='user_dashboard.php';
        </script>";
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
        <script type="text/javascript">
          $(document).ready(function(){
           $("#manage_task").click(function(event){
            event.preventDefault(); // Prevent the default behavior (e.g., navigating to a new page)
            $("#right_sidebar").load("manage_task.php");
        });
    });
</script>
<script type="text/javascript">
          $(document).ready(function(){
           $("#apply_leave").click(function(event){
            event.preventDefault(); // Prevent the default behavior (e.g., navigating to a new page)
            $("#right_sidebar").load("apply_leave.php");
        });
    });
</script>
<script type="text/javascript">
          $(document).ready(function(){
           $("#view_leave").click(function(event){
            event.preventDefault(); // Prevent the default behavior (e.g., navigating to a new page)
            $("#right_sidebar").load("view_leave.php");
        });
    });
</script>
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>TASK MANAGER</h3>
            </div>
            <div class="col-md-6 " style="display: inline-block;text-align: right;" >
                <b>Email:</b> <?php echo $_SESSION['email'];?>
                <span style="margin-left: 25px;"><b>Name:</b><?php echo $_SESSION['name'];?> </span>

</div>
</div>
<div class="row">
    <div class="col-md-2" id="left_sidebar">
        <table class="table" >
            <tr>
                <td style="text-align:center">
                    <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <a type="button" class="link" id="manage_task">Update Task</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <a type="button" class="link" id="apply_leave">Apply Leave</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <a type="button" class="link" id="view_leave">Leave Status</a>
                </td>
            </tr>
            <tr>
                <td style="text-align:center">
                    <a href="logout.php" type="button" id="logout_link">Logout</a>
                </td>
            </tr>
</table>
    </div>
    <div class="col-md-10" id="right_sidebar">
        <h4>Instructions for Employees</h4>
        <ol style="line-height:3em; font-size:1.2em;">
            <li>All employees must mark their attendance everyday.</li>
            <li>All employees must complete the task assigned to them.</li>
            <li>Keep the office area and desk clean and tidy.</li>
            <li>Lastly, Maintain the decorum of the office.</li>
</ol> 
</body>
</html>
<?php
}
else{
    header('Location:user_login.php');
}