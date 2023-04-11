<?php
session_start();

// check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
  header('Location: log.php');
  exit;
}

// get the receiver and message from the form
$receiver = $_POST['receiver'];
$message = $_POST['message'];

// insert the message into the database
$conn = mysqli_connect('localhost', 'root', ' ', 'vehicle database');
$sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ('$sender_id', '$receiver_id', '$message')";
mysqli_query($conn, $sql);
mysqli_close($conn);

// redirect to the admin dashboard
header('Location: Adminpage.php');
exit;