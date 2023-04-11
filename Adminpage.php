<?php
session_start();
include('conn.php');
include('functions.php');
#include("adminreg.php");
#include("usersadmin.php");
#include("adminreport.php");
$admin_data=check_admin_login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylevehicle.css">

</head>
<body>
<div class="menu-bar">      
        <ul>
            <li><a href="adminreg.php"></i>Registration View</a></li>
            <li><a href="usersadmin.php">Registered Users</a></li>
            <li><a href="adminreport.php">Reports Made</a></li>
            <li><a href="users_messages.php">Users messages</a></li>
            <li><a href="details.php">Registered User Details</a></li>
            <li><a href="reply messages.php">Reply Messages</a></li>
            <li><a href="logout.php">Log out</a></li>
            
        </ul>
    </div>
                    <img src="ADMIN.PNG" alt="Profile Picture">
                    <span><?php echo $admin_data['username']; ?></span>

            </div>
            
    <?php
include("conn.php");

echo"<p><b><h3>WELCOME ADMIN YOU CAN PERFOM TASKS</h3></b></p>";
// Execute the SQL statement to get the number of reports
$query = "SELECT COUNT(*) AS report_count FROM report_lost_vehicle";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Store the report count in a variable
$report_count = $row['report_count'];


// Add some HTML code to separate the two tables
echo "<div style='margin: 50px;'></div>";

// Execute the SQL statement to get the number of users
$query = "SELECT COUNT(*) AS user_count FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo "<div style='margin: 50px;'></div>";
// Store the user count in a variable
$user_count = $row['user_count'];
// Execute the SQL statement to get the number of users
echo "<div style='margin: 50px;'></div>";


// Store the user count in a variable

echo "<div style='margin: 50px;'></div>";
$query = "SELECT COUNT(*) AS message_count FROM contact_us";
$result_message = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result_message);

// Store the user count in a variable
$message_count= $row['message_count'];
echo"<div style='display: flex;'>
<div style='background-color: #ccc; padding: 100px; width: 100px; text-align: center; margin-right: 20px;'><?php echo $report_count ?>$report_count Reports Made</div>
<div style='background-color: #ccc; padding: 100px; width: 100px; text-align: center; margin-right: 20px;'><?php echo $user_count ?>$user_count Users Signed in</div>
<div style='background-color: #ccc; padding: 125px; width: 120px; text-align: center; margin-right: 20px;'><?php echo $message_count ?>$message_count Messages</div>
 
  
</div>";
?>

</body>
</html>