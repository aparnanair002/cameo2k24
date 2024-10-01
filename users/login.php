<?php
include '../connection.php';
session_start();

// Check if form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM tbl_coord WHERE cord_name = ? AND cord_pass = ?");

    // Bind the parameters to the query (s = string)
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store user information in session variables
        $_SESSION['cord_name'] = $row['cord_name'];
        $_SESSION['event'] = $row['event'];
        $_SESSION['comp'] = $row['comp'];


        // Redirect to home page
        header("Location: ./index.php");
        exit();
    } else {
        // Invalid login, handle error (optional)
        echo "<script>alert('Invalid username or password');</script>";
    }

    // Close the statement and the connection
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Full-page background and centering */
body, html {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg, #2980b9, #6dd5fa); /* Gradient background */
}

/* Container for login box */
.login-container {
    width: 100%;
    max-width: 400px;
    background: rgba(255, 255, 255, 0.2);
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px); /* Adds a glassy effect */
}

/* Styling the login form */
.login-box h2 {
    text-align: center;
    color: black;
    margin-bottom: 20px;
}

.input-box {
    margin-bottom: 15px;
    position: relative;
}

.input-box label {
    display: block;
    color:black;
    font-size: 14px;
    margin-bottom: 5px;
}

.input-box input {
    width: 100%;
    padding: 10px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    transition: background 0.3s ease;
}

/* Change background color when focusing on the input */
.input-box input:focus {
    background: rgba(255, 255, 255, 0.2);
    outline: none;
}

/* Login button */
.login-btn {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.login-btn:hover {
    background-color: #2980b9;
    transform: scale(1.05); /* Slight grow animation on hover */
}

/* Register link */
.register-link {
    text-align: center;
    color: white;
    font-size: 14px;
}

.register-link a {
    color: #fffbf2;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

/* Responsive design */
@media (max-width: 500px) {
    .login-container {
        width: 90%;
    }
}

        </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-box">
                    <button type="submit" name="login" class="login-btn">Login</button>
                </div>
                <?php
                    if (isset($_GET['error'])) {
                        echo "<h4 style='color:white; margin-top: 20px; text-align:center;'>Not authorized Personnel !!</h4>";
                    }
                    ?>
            </form>
        </div>
    </div>
</body>

</html>
