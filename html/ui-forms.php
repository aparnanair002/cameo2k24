<!doctype html>
<html lang="en">
<style>
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

        th {
            background-color: #005EB8;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
</style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php
    include('sidebar.php');
    ?>
     
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Treasure Hunt Competition - ONE_PIECE</h5>
              <div class="card">
                <div class="card-body">
                <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>                <th>Phone</th>
                <th>College</th>
                <th>Transaction Id</th>
                <th>Approve</th>
                <th>Reject</th>
              </tr>
        </thead>
        <tbody>
                <?php
include('../connection.php');

$sql = "select * from tbl_coding where cod_status=0";
     
$result=mysqli_execute_query($conn,$sql);
if (!$result) {
die("Query failed: " . mysqli_error($conn));
}
if ($result->num_rows > 0) {
// Fetch the data
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['cod_name']."</td>";
echo "<td>" . $row['cod_email']."</td>";
echo "<td>" . $row['cod_phno']."</td>";
echo "<td>" . $row['cod_college']. "</td>"; // Append each row to the data variable
echo "<td>" .$row['cod_trn_id']."</td>";
echo "<td><input type='submit' value='Approve' name='appr' class='btn btn-success'></button></td>";
echo "<td><input type='submit' value='Reject' name='rej' class='btn btn-success'></button></td>";

//echo "<td><input type='reject' class='btn btn-Danger'></button></td>";

echo "</tr>";
}
}
else {
  echo "<tr><td colspan='3'>No data available</td></tr>";
}
// Close the connection
mysqli_close($conn);
?>


                </div>
                          </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>