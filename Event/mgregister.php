<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">

    <title>Login Page</title>
</head>
<body>
<section class="form-section">
    <div class="form-container">
        <h2>Coding Register</h2>
        <form id="registerForm" action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="cname">College Name:</label>
                <input type="text" id="cname" name="cname" required>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phoneno">Phone Number:</label>
                <input type="text" id="phoneno" name="phoneno" required pattern="\d{10}" title="Enter a valid 10-digit phone number">
            </div>

            <label for="payment">Payment</label>
            <div class="form-image">
                <img src="../image/OIP.jpg" alt="Form Image">
            </div>

            <div class="form-group">
                <label for="transactionid">Transaction ID:</label>
                <input type="text" id="transactionid" name="transactionid" required pattern="[a-zA-Z0-9]{6,}" title="Transaction ID should be at least 6 characters long, alphanumeric.">
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn" name="submitbtn">Register</button>
            </div>
        </form>
    </div>
</section>

<script>
    function validateForm() {
        // Get form field values
        const cname = document.getElementById("cname").value.trim();
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const phoneno = document.getElementById("phoneno").value.trim();
        const transactionid = document.getElementById("transactionid").value.trim();
        const terms = document.getElementById("terms").checked;

        // Regular expressions for validation
        const phonePattern = /^\d{10}$/;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const transactionPattern = /^[a-zA-Z0-9]{12}$/;

        // Validate each field
        if (cname === "") {
            alert("Please enter the college name.");
            return false;
        }

        if (name === "") {
            alert("Please enter your name.");
            return false;
        }

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!phonePattern.test(phoneno)) {
            alert("Please enter a valid 10-digit phone number.");
            return false;
        }

        if (!transactionPattern.test(transactionid)) {
            alert("Transaction ID should be contain 12-digit");
            return false;
        }

        if (!terms) {
            alert("You must agree to the terms and conditions.");
            return false;
        }

        // If all fields are valid, form can be submitted
        return true;
    }
</script>


</body>
<?php
if(isset($_POST['submitbtn']))
{
$con = mysqli_connect("localhost", "root", "", "db_cameo2k24");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo $cname;
$cname=$_POST["cname"];
$name=$_POST["name"];
$email=$_POST["email"];
$phoneno=$_POST["phoneno"];
$transactionid=$_POST["transactionid"];
$status=0;
include 'recheck.php';
if ($re->num_rows > 0){
      ?>
      <script>alert('Email already exists');</script>
      <?php
}
else{
$query="insert  into  tbl_memory(t_college,t_name,t_email,t_phno,t_trn_id,t_status)values('$cname','$name1','$email','$phoneno','$transactionid',$status)";
$result=mysqli_query($con,$query);
header("location:../check.php");
}}
?>
</html>
