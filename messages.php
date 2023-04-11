<?php
// connect to the database
$host = "localhost";
$username = "root";
$password = " ";
$database = "vehicle database";
$conn = mysqli_connect($host, $username, $password, $database);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// retrieve messages from the database
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

// display messages
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "From: " . $row["sender_name"] . "<br>";
    echo "Message: " . $row["message_content"] . "<br><br>";
  }
} else {
  echo "No messages yet.";
}

// close database connection
mysqli_close($conn);
?>
