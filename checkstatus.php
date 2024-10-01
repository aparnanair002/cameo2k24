<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    * {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(120deg, #2980b9, #6dd5fa);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Dashboard Section */
.dashboard-section {
    width: 90%;
    max-width: 800px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

thead {
    background-color: #007bff;
    color: white;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

/* Responsive Table */
@media screen and (max-width: 600px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }
    
    th {
        display: none;
    }
    
    td {
        position: relative;
        padding-left: 50%;
        text-align: left;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        top: 12px;
        font-weight: bold;
        color: #007bff;
    }

    tr {
        margin-bottom: 20px;
        display: block;
        border-bottom: 2px solid #ddd;
    }
}

/* Logout Button */
.logout-button-container {
    text-align: right;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}

</style>  
  <title>View</title>
</head>
<body>
    <section class="dashboard-section">
        <div class="dashboard-container">
            <!-- Table to display data -->
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th>College Name</th>
                        <th>Email ID</th>
                        <th>Student Name</th>
                        <th>Status</th>
                        <th>tbj</th>
                    </tr>
                </thead>
                <tbody>
              

<?php
if(isset($_POST['submit'])){
session_start();
$con = mysqli_connect("localhost", "root", "", "db_cameo2k24");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email']; // Ensure you sanitize input

// SQL query to check email in 8 tables
$sql = "
SELECT t_college, t_email, t_name1, t_status FROM tbl_bgmi WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name, t_status FROM tbl_coding WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name1, t_status FROM tbl_escape WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name, t_status FROM tbl_football WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name, t_status FROM tbl_memory WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name1, t_status FROM tbl_reels WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name1, t_status FROM tbl_treasure WHERE t_email = '$email'
UNION
SELECT t_college, t_email, t_name1, t_status FROM tbl_word WHERE t_email = '$email'
";

// Execute the query
$result = $con->query($sql);


// Check if any rows are returned
if ($result->num_rows > 0) {
    // Display data in a table
    // Fetch each row and print it

    while($row = $result->fetch_array()) {
        $_SESSION['email']=$row['t_email'];

        if ($row['t_status']==0)
                {
                    $status="Pending";
                }
                elseif($row['t_status']==1)
                {
                    $status="Approved";
                }
                else{
                    $status="Rejected";
                }
        echo "<tr>
                <td>" . htmlspecialchars($row[1]) . "</td>
                <td>" . htmlspecialchars($row['t_email']) . "</td>
                <td>" . htmlspecialchars($row[2]) . "</td>
                <td>" . htmlspecialchars($status)  . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found for the given email ID.";
}

// Close the database connection
$con->close();
}

?>

    </tbody>
</table>

                </tbody>
            </table>

            <!-- Logout Button -->
            <div class="logout-button-container">
    <a href="check.php" class="btn">Logout</a>
</div>

        </div>
    </section>
    <?php
    exit();
    ?>
</body>
</html>
