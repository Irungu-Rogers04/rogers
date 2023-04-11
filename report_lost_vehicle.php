<?php
// Establish a connection to the database
$host = "localhost";
$username = "root";
$password = " ";
$dbname = "vehicle database";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the message from the form
    $message = $_POST["message"];
    $email = $_POST["email"];
    $timestamp = date("Y-m-d H:i:s"); // get current timestamp

    // Insert the message into the database
    $sql = "INSERT INTO report_lost_vehicle (message,email,timestamp) VALUES ('$message','$email','$timestamp')";
    if (mysqli_query($conn, $sql)) {
        echo "Message added successfully";
    } else {
        echo "Error adding message: " . mysqli_error($conn);
    }
}
?>

<!-- HTML form for entering a message -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="message">Message:</label>
    <input type="text" name="message" id="message"><br><br>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email"><br><br>
    <input type="submit" value="Submit">
</form>
<?php
if (isset($_POST['message'])) {
    echo "Message sent successfully";
}
?>