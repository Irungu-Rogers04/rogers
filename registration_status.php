<?php
session_start();
include('conn.php');
include('functions.php');
$userdata = check_login($conn);
// Fetch the registration data of the logged in user
$query = "SELECT * FROM user_vehicle_registration WHERE user_id = '".$userdata['id']."'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // Display the registration data with its status
    $row = mysqli_fetch_assoc($result);
    echo "<h2>Registration Status:</h2>";
    echo "<p>Name: ".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</p>";
    echo "<p>Phone Number: ".$row['phoneNo']."</p>";
    echo "<p>Email: ".$row['email']."</p>";
    echo "<p>Plate Number: ".$row['plateNo']."</p>";
    echo "<p>VIN: ".$row['vin']."</p>";
    echo "<p>Engine Number: ".$row['engineNo']."</p>";
    echo "<p>Color: ".$row['color']."</p>";
    echo "<p>Model: ".$row['model']."</p>";
    echo "<p>Year of Manufacture: ".$row['yearofmanufacture']."</p>";
    echo "<p>Status: ".$row['status']."</p>";
} else {
    echo "<p>No registration data found.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script>
$(document).ready(function() {
    // Get the status of the user's registration
    $.ajax({
        type: "POST",
        url: "check_registration_status.php",
        dataType: "json",
        success: function(data) {
            if (data.status == "Confirmed") {
                $("#registration-status").html("Your registration has been confirmed!");
            } else if (data.status == "Pending") {
                $("#registration-status").html("Your registration is pending review.");
            } else {
                $("#registration-status").html("You have not registered any vehicle yet.");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#registration-status").html("Error checking registration status: " + textStatus);
        }
    });
});
</script>
</html>