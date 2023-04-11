<?php
include("conn.php");

// Retrieve user reports from database
$sql = "SELECT * FROM report_lost_vehicle";
$result = mysqli_query($conn, $sql);

// Display user reports in HTML table
echo '<table>';
echo '<tr><th>Email</th><th>Message</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['email'] . '</td>';

    echo '<td>' . $row['message'] . '</td>';
    echo '</tr>';
}
echo '</table>';

// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
          border-collapse: collapse;
           width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  color: black;
}
    </style>
</head>
<body>
    
</body>
</html>
