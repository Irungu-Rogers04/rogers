<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #3cdd36;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #4545a0;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email details from the form
    $recipient_email = $_POST['recipient_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $timestamp = date("Y-m-d H:i:s"); // get current timestamp

    // Send the email
    $headers = "From: rogersiru@gmail.com" . "\r\n" .
               "Reply-To: irungurodgers@zetech.ac.ke" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    mail($recipient_email, $subject, $message, $headers);

    // Insert the email details into the database
    $sql = "INSERT INTO emails (recipient_email, subject, message, timestamp) VALUES ('$recipient_email',  '$subject', '$message', '$timestamp')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green; text-align: center;'>Email sent successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error in sending your reply: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}
mysqli_close($conn);
?>

<div id="container">
    <h2>Email Form</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="recipient_email">Recipient Email:</label>
        <input type="email" name="recipient_email" required>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required>

        <label for="message">Message:</label>
        <textarea name="message" rows="5" cols="50" required></textarea>

        <input type="submit" value="Send Email">
    </form>
</div>

</body>
</html>
