<?php
include("connection.php");
/*Fetch events from the database
$sql = "SELECT id, title, date FROM events";
$result = $conn->query($sql);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Event Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="admin-container">
        <!-- Left Side - List of Events -->
        <aside class="sidebar">
            <h2>Events</h2>
            <ul class="event-list">
                <?php
                if ($result->num_rows > 0) {
                    // Output each event as a list item
                    while($row = $result->fetch_assoc()) {
                        echo "<li class='event-item' onclick='showEventDetails(" . $row['id'] . ")'>" . $row['title'] . " (" . $row['date'] . ")</li>";
                    }
                } else {
                    echo "<li>No events available</li>";
                }
                ?>
            </ul>
        </aside>

        <!-- Right Side - Event Details -->
        <section class="content">
            <h2>Event Details</h2>
            <div id="event-details" class="event-details">
                <p>Select an event to see its details.</p>
            </div>
        </section>
    </div>

    <!-- JavaScript to Fetch Event Details Dynamically -->
    <script>
        function showEventDetails(eventId) {
            // Make an AJAX request to get the event details
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'event-details.php?id=' + eventId, true);
            xhr.onload = function() {
                if (this.status == 200) {
                    document.getElementById('event-details').innerHTML = this.responseText;
                }
            };
            xhr.send();
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
