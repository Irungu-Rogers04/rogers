<?php

// Get the message id and reply from the form
$message_id = $_POST['message_id'];
$reply = $_POST['reply'];

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = ' ';
$database = 'vehicle database';
$conn = mysqli_connect($host, $user, $password, $database);

// Update the message with the reply
$sql = "UPDATE messages SET reply='$reply' WHERE id=$message_id";
mysqli_query($conn, $sql);

// Get the user's email address and send the notification
$sql = "SELECT email FROM messages WHERE id=$message_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email = $row['email'];

$to = $email;
$subject = 'Your message has been replied';
$message = 'Your message has been replied. Here is the reply: '.$reply;
$headers = 'From: admin@example.com';

mail($to, $subject, $message, $headers);

// Close the database connection
mysqli_close($conn);

// Redirect back to the page with a success message
header('Location: messages.php?success=1');
exit();
