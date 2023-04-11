<?php
include("conn.php");

// Execute the SQL statement to get the number of reports
$query = "SELECT COUNT(*) AS report_count FROM user_report";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Store the report count in a variable
$report_count = $row['report_count'];

// Display the report count in a rectangle
echo "<div style='background-color: #ccc; padding: 10px; width: 200px; text-align: center;'>$report_count Reports</div>";
$query = "SELECT COUNT(*) AS user_count FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Store the report count in a variable
$user_count = $row['user_count'];

// Display the report count in a rectangle
echo "<div style='background-color: #ccc; padding: 10px; width: 200px; text-align: center;'>$user_count users</div>";
?>