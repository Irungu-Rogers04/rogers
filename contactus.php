<?php
session_start();
include("conn.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Prepare and execute the SQL statement
    $query="INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $query)) {
        // display success message and redirect to success page
        echo "Thank you for contacting us! We will get back to you soon.";
        die();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Contact Us</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            background-image: url("ROGERSMWANGI.JPG");
   
 }
        

        h1 {
            text-align: center;
            color: #1c22d3;
            margin-top: 50px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1cd394;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #ccc;
        }

        label {
            display: block;
            margin-bottom: 10px;
            
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
        }

        textarea {
            height: 200px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Contact Us</h1>
    <?php
    echo"<p><i class='ri-mail-line'><a href='mailto:rogersiru@gmail.com'></i>Email</a></p>";
    ?>
    <?php
    echo"<p>Follow us on Facebook: <i class='ri-facebook-fill'></i><a href='https://facebook.com/Rogers Mwangi'>Facebook</a></p>";
    ?>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <input type="submit" value="Send">
    </form>
    <?php
    #echo"<p style='text-align:right;'><i class='ri-mail-line'><a href='mailto:rogersiru@gmail.com'></i>Email</a></p>";
    ?>
    <?php
    #echo"<p style='text-align:right;'>Follow us on Facebook: <a href='https://Facebook.com/Rogers Mwangi'>Facebook</a></p>";
    ?>
</body>
</html>
