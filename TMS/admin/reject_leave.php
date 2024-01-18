<?php
    include('../includes/connection.php');
    $query="update leaves set status='Reject' where lid=$_GET[id]";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        echo"<script type='text/javascript'>
            alert('Leave Rejected Succesfully');
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
    ?>