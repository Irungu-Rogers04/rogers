<?php
// Start the session and connect to the database
session_start();
$conn = mysqli_connect("localhost", "root", " ", "vehicle database");

// Check if the user is logged in as an admin
if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
  // Get the message id and reply from the form data
  $message_id = $_POST['message_id'];
  $reply = $_POST['reply'];

  // Update the message in the database with the reply and admin username
  $query = "UPDATE messages SET reply='$reply', admin_username='{$_SESSION['username']}' WHERE id='$message_id'";
  mysqli_query($conn, $query);

  // Insert a notification into the database for the user who sent the message
  $message_query = "SELECT * FROM messages WHERE id='$message_id'";
  $message_result = mysqli_query($conn, $message_query);
  $message = mysqli_fetch_assoc($message_result);
  $user_id = $message['user_id'];
  $notification_query = "INSERT INTO notifications (user_id, message) VALUES ('$user_id', 'You have a new reply to your message')";
  mysqli_query($conn, $notification_query);

  // Redirect the admin to the messages page with a success message
  $_SESSION['success'] = "Reply sent successfully";
  header('location: messages.php');
  exit();
} else {
  // If the user is not an admin, redirect them to the login page
  header('location: login.php');
  exit();
}
?>
