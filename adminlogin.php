<?php
include 'connection.php';
session_start();

// Check if form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 $f=0;
    // Prepare and bind
    $stmt = mysqli_query($conn,"SELECT * FROM tbl_admin WHERE admin_name = '$username' and admin_pass='$password'");

    // Check if username exists
    while ($row=mysqli_fetch_array($stmt)) {
        if ($row >0){
            // Store user ID in session and redirect to another page
            $_SESSION['admin_id']=$row['admin_id'];
            $_SESSION['admin']=$row['admin_name'];

            header("Location: html/index.php");
            exit();
        } 
    else {
        $f=1;
    }
    }
    if ($f=1)
    {
        header("Location: login.php?error=1");
        exit();
        

    }
    $stmt->close();


}
$conn->close();
?>
