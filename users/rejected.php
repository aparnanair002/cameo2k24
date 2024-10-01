<!doctype html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['cord_name'])) {
    header('Location: ./login.php');
    exit();
}
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
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
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
   <?php
   include('sidebar.php');
   

   ?>
        
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">
                                <?php echo $_SESSION['comp']; ?>
                            </h5>
                            
                            <div class="card">
                                <div class="card-body">
                                <table id='my-table'>
        <thead>
            <tr>
        <?php
        include('../connection.php');
                                                // Close the connection
                                               
                                                // Get the table name from session
                                                $tbl = $_SESSION['event'];
                                                
                                                // Prepare the query to get column names dynamically
                                                $sql_columns = "SHOW COLUMNS FROM $tbl";
                                                $result_columns = mysqli_query($conn, $sql_columns);

                                                if (!$result_columns) {
                                                    die("Query failed: " . mysqli_error($conn));
                                                }

                                                // Loop through the result and output column names
                                                while ($column = mysqli_fetch_assoc($result_columns)) {
                                                    echo "<th>" . ucfirst($column['Field']) . "</th>";
                                                }
                                                echo"<th>Approve</th><th>Reject</th></tr></thead><tbody>";
                                                
                                           
        //php for finding students to be approved

$sql = "select * from $tbl where t_status=2";     
$result=mysqli_execute_query($conn,$sql);

if (!$result) {
die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Fetch the data
    while ($ro = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($ro as $dat) {
            echo "<td>" . htmlspecialchars($dat) . "</td>";
        }
        echo "<td><a href='verify.php?id=".$ro['t_id']."' type='submit' name='appr' class='btn btn-success'>Approve</a>";
        echo "<td><a href='?id=".$ro['t_id']."' type='submit'  name='rej' class='btn btn-danger'>Reject</a>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='" . mysqli_num_fields($result) . "'>No data available</td></tr>";
}

//php for finding students to be approved-->


if(isset($_GET['id']))
{
  
  $id=$_GET['id'];
  yurfn($id);
}
  function yurfn($id){
    $tbl = $_SESSION['event'];

    include('../connection.php');
  $sql = "update $tbl set t_status=2 where t_id=$id";
       
  $result=mysqli_execute_query($conn,$sql);
  if (!$result) {
  die("Query failed: " . mysqli_error($conn));
  }
}
?>
                                        </tbody>
                                    </table>
                                    <button id='btn-export' class='btn btn-success'>
                                        <b>Export as XLSX</b>
                                    </button>
                                </div>
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
  <script src="../assets/js/dashboard.js"></script>
    <script>const exportButton = document.getElementById('btn-export');

const table = document.getElementById('my-table');

exportButton.addEventListener('click', () => {
  /* Create worksheet from HTML DOM TABLE */
  const wb = XLSX.utils.table_to_book(table, {sheet: 'sheet-1'});

  const now = new Date();
const year = now.getFullYear();
const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so add 1
const day = String(now.getDate()).padStart(2, '0');
const hours = String(now.getHours()).padStart(2, '0');
const minutes = String(now.getMinutes()).padStart(2, '0');
const seconds = String(now.getSeconds()).padStart(2, '0');

// Construct the filename with the current date and time
const filename = `<?php echo $tbl;echo "rejected";?>${year}-${month}-${day}_${hours}-${minutes}-${seconds}.xlsx`;

// Write the Excel file with the dynamic filename
XLSX.writeFile(wb, filename);
});
</script>
</body>


</html>