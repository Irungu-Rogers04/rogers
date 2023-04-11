<?php
session_start();
include('conn.php');
include('functions.php');

// Check if user is logged in
$user_data = check_login($conn);

// Get registration status for the logged in user
$query = "SELECT status FROM user_vehicle_registration WHERE id = " . $id['id'];
$result_ = mysqli_query($conn, $query);

if (!$result_) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result_) > 0) {
    $row = mysqli_fetch_assoc($result_);

    if (!$row) {
        die("No rows found.");
    }

    $status = $row['status'];
    echo "Your registration status is: " . $status;
} else {
    echo "No registration found.";
}
?>