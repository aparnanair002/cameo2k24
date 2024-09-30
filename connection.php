<?php 
$server = "localhost";
$username = "root";
$password = "";
$db = "db_cameo2k24";
$conn = mysqli_connect($server, $username, $password,$db); 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$select_db = mysqli_select_db($conn, $db); 
if (!$select_db) {
    die("Error selecting database: " . mysqli_error($conn));
}
?>