<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">

    <title>Login Page</title>
</head>
<body>
<center>
<section class="form-section">
    <div class="form-container">
        <h2>Memory Game Registration</h2>
        <form id="registerForm" action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
            <input type="text" id="cname" name="cname" placeholder="College Name:" required>
            </div>

            <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Enter Student Name " required>
            </div>

            <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="form-group">
            <input type="text" id="phoneno" placeholder="Enter Phone Number:" name="phoneno" required
            pattern="\d{10}" title="Enter a valid 10-digit phone number">
            </div>

            <label for="payment">Payment</label>
                    <div class="">
                        <div id="qrcode"></div>
                    </div>
                    <div class="form-group">
                        <a id="paymentlink" href="upi://pay?pa=jerinj83@fifederal&pn=Cameo&cu=INR&am=100"><button
                                type="button" class="btn" style="margin-top: 20px;">Pay Now</button></a>
                    </div>
                    <div class="form-group">
                        <input type="text" id="transactionid" name="transactionid" placeholder="Enter transaction ID"
                            required pattern="[a-zA-Z0-9]{12}" title="Transaction ID should contain 12- digits">
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
</center>

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
      echo"
      <script>alert('Email already exists');</script>
      ";
}
else{
// Prepare the SQL query with placeholders
$query = "INSERT INTO tbl_memory (t_college, t_name, t_email, t_phno, t_trn_id, t_status) 
          VALUES (?, ?, ?, ?, ?, ?)";

// Initialize a prepared statement
$stmt = mysqli_prepare($con, $query);

// Bind the input variables to the placeholders
mysqli_stmt_bind_param($stmt, 'sssssi', $cname, $name, $email, $phoneno, $transactionid, $status);

// Execute the prepared statement
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // Use JavaScript to redirect to the index page
    echo "<script>
            window.location.href = '../index.html';
          </script>";
    exit; // Make sure to exit after redirecting
} else {
    // Output an error message using JavaScript
    $errorMessage = mysqli_error($con);
    echo "<script>
            alert('Error: " . addslashes($errorMessage) . "');
            window.location.href = '../errorpage.html'; // You can redirect to a specific error page if needed
          </script>";
}

// Close the prepared statement
mysqli_stmt_close($stmt);
}
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"
    integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
var upiID = "naveenjames835@okhdfcbank";
var amount = 50;

document.getElementById("paymentlink").href = `upi://pay?pa=${upiID}&pn=Cameo&cu=INR&am=${amount}`;
// QR code generation with size
new QRCode(document.getElementById("qrcode"), {
    text: `upi://pay?pa=${upiID}&pn=Cameo&cu=INR&am=${amount}`,
    width: 200,
    height: 200,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
});
</script>
</html>
