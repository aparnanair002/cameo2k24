<?php
session_start();
unset($_SESSION['cord_name']);
unset($_SESSION['event']);
session_destroy();
header('Location: ./login.php');

?>