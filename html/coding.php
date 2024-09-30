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
              <h5 class="card-title fw-semibold mb-4">Coding Competition - CODDICT</h5>
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


        <!--php for finding students to be approved-->
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
echo "<td><a href='verify/cod.php?id=".$row['cod_id']."' type='submit' name='appr' class='btn btn-success'>Approve</a>";
echo "<td><a href='?id=".$row['cod_id']."' type='submit'  name='rej' class='btn btn-danger'>Reject</a>";
echo "</tr>";
}
echo "</tbody></table>";
}
else {
  echo "<tr><td colspan='3'>No data available</td></tr>";
}
// Close the connection
mysqli_close($conn);
?>


<!--php for finding students to be approved-->


<?php
if(isset($_GET['id']))
{
  
  $id=$_GET['id'];
  yurfn($id);
}
  function yurfn($id){
    include('../connection.php');
  $sql = "update tbl_coding set cod_status=2 where cod_id=$id";
       
  $result=mysqli_execute_query($conn,$sql);
  if (!$result) {
  die("Query failed: " . mysqli_error($conn));
  }
}
?>

    <table id="my-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>                
                <th>Phone</th>
                <th>College</th>
                <th>Transaction Id</th>

              </tr>
        </thead>
        <tbody>
        
        <?php
include('../connection.php');

$sdnld = "select * from tbl_coding where cod_status=1";
     
$result=mysqli_execute_query($conn,$sdnld);
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
//echo "<td><input type='reject' class='btn btn-Danger'></button></td>";

echo "</tr>";
}

echo "</tbody></table>";
echo "<button id='btn-export' class='btn btn-success'><b>Export as XLSX</b></button>";

}
else {
  echo "<tr><td colspan='3'>No data available</td></tr>";
}
// Close the connection
mysqli_close($conn);
?>
                </div>
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
  <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../javascript/dwnld.js"></script>

</body>

</html>