<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #4c4faf;
            padding: 0;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }
        .form-box h1 {
            margin: 0;
            text-align: center;
            font-size: 32px;
            color: #4c4faf;
        }
        .input-group {
            margin-top: 30px;
        }
        .input-group .input-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .input-group .input-field input {
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .input-group .input-field input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .btn-field {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-field button {
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        .btn-field button:hover {
            background-color: #3e8e41;
        }
        p {
            margin: 10px 0;
            font-size: 14px;
            text-align: center;
        }
        p a {
            color: #4CAF50;
        }
        p a:hover {
            color: #3e8e41;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <h1>Sign up</h1>
      <form method="post">
        <div class="input-group">
          <div class="input-field">
            <input type="text" name="username" placeholder="Username">
          </div>
          <div class="input-field">
            <input type="text" name="email" placeholder="Email">
          </div>
          <div class="input-field">
            <input type="password" name="password" placeholder="Password">
          </div>
          <div class="btn-field">
            <button type="submit">Sign up</button>
          </div>
        </div>
      </form>
      <?php
        session_start();
        include("conn.php");
        include("functions.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          //something was posted
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          if (!empty($username) && !empty($password) && !empty($email) && !is_numeric($username)) {
            //save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users(user_id,username,email,password) VALUES ('$user_id','$username','$email','$password')";
            mysqli_query($conn, $query);
            header("Location: log.php");
            die;

          } else {
            echo "<p style='color:red;'> Please Enter Valid Details</p>";
          }
        }
      ?>
    </div>
  </div>
</body>
</html>
