<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
if(isset($_SESSION['email'])){
unset($_SESSION['email']);
session_destroy();
header('Location:  index.html');

}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg, #2980b9, #6dd5fa);
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full height */
}

.login-section {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 90%; /* Responsive width */
    max-width: 400px; /* Max width for larger screens */
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="email"] {
    width: 100%; /* Full width */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {

    background-color: #007bff; /* Button color */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    width: 100%; /* Full width */
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

    </style>
    <title>Login Page</title>
</head>
<body>
    <section class="login-section">
        <div class="login-container">
            <h2>Check Status</h2>
            <form id="loginForm" action="checkstatus.php" method="POST">
                <div class="form-group">
                    <label for="email">Email ID:</label>
                    <input type="email" id="email" name="email" required>
                    
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" required>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
