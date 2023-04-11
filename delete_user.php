<?php
include("conn.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $user_id = $_GET['id'];
    $query = "DELETE FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "User successfully deleted!";
    } else {
        echo "Error deleting user.";
    }
}
#header("Location: Adminpage.php");
die;
?>