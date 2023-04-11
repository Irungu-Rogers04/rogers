<?php
// Include necessary files
require_once("functions.php");
require_once("conn.php");

// Fetch all user vehicle registration data from database
$query = "SELECT * FROM user_vehicle_registration";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Display table with all the user vehicle registration data
    echo "<table><tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Plate No.</th><th>VIN</th><th>Engine No.</th><th>Color</th><th>Model</th><th>Year of Manufacture</th><th>Status</th><th>Actions</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['idNo']."</td><td>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</td><td>".$row['phoneNo']."</td><td>".$row['email']."</td><td>".$row['plateNo']."</td><td>".$row['vin']."</td><td>".$row['engineNo']."</td><td>".$row['color']."</td><td>".$row['model']."</td><td>".$row['yearofmanufacture']."</td><td>".$row['status']."</td><td><a href='Adminpage.php?action=confirm&id=".$row['idNo']."'>Confirm</a> / <a href='Adminpage.php?action=delete&id=".$row['idNo']."' onclick=\"return confirm('Are you sure you want to delete this registration?');\">Delete</a></td></tr>";
        
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Process confirm/delete actions
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];
    if ($action == "confirm") {
        // Update the registration status to confirmed
        $query = "UPDATE user_vehicle_registration SET status = 'Confirmed' WHERE idNo = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Registration confirmed successfully.";
        } else {
            echo "Error updating registration status: " . mysqli_error($conn);
        }
    } else if ($action == "delete") {
        // Delete the registration from the database
        $query = "DELETE FROM user_vehicle_registration WHERE idNo = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Registration deleted successfully.";
        } else {
            echo "Error deleting registration: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Vehicle Registrations</title>
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
</html