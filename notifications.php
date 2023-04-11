<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "vehicle database";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = ['user_id'];
$sql = "SELECT * FROM messages WHERE receiver_id = 'user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

// Display the messages
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<p>From: ' . $row['sender_id'] . '</p>';
    echo '<p>Message:' . $row['message'] . '</p>';
    echo '<p>Sent at: ' . $row['created_at'] . '</p>';
  }
} else {
  echo "No messages";
}

// Close the database connection
$conn->close();
?>
