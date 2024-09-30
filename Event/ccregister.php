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
        <h2> Coding Register</h2>
        <form action="" method="POST">
        <div class="form-group">
                <label for="name">College Name:</label>
                <input type="text" id="name" name="cname" required>
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
                <input type="text" id="phoneno" name="phoneno" required>
            </div>
            <label for="payment">Payment</label>
            <div class="form-image">
                <img src="../image/OIP.jpg" alt="Form Image">
            </div>
            <div class="form-group">
                <label for="transactionid">Transaction id:</label>
                <input type="text" id="transactionid" name="transactionid" required>
            </div>
            <div class="form-group checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn"  name="submitbtn">Register</button>
            </div>
        </form>
    </div>
</section>

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
// echo $transactionid;
$query="insert  into  tbl_coding(cod_college,cod_name,cod_email,cod_phno,cod_trn_id,cod_status)values('$cname','$name','$email','$phoneno','$transactionid',$status)";
$result=mysqli_query($con,$query);
echo $query;
}
?>
</html>
