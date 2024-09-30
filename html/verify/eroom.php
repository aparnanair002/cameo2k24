<?php
include('../../connection.php');

$id=$_GET['id'];
$sql = "update tbl_escape set t_status=1 where t_id=$id";
     
$result=mysqli_execute_query($conn,$sql);
if (!$result) {
die("Query failed: " . mysqli_error($conn));
}
else{
    header('Location: ../escaperoom.php');
    exit();
}

?>