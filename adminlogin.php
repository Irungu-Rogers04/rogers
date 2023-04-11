<?php
session_start();
include("conn.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    //something was posted
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!empty($username) && !empty($password) && !is_numeric($username)) 
    {
        //read from database
        $sql="select * from admins where username='$username' limit 1";
        $admin_result=mysqli_query($conn,$sql);
        if($admin_result && mysqli_num_rows($admin_result)>0)
        {
            $admin_data=mysqli_fetch_assoc($admin_result);
            if($admin_data['password'] === $password)
            {
                $_SESSION['admin_id']=$admin_data['admin_id'];
                header("Location: Adminpage.php");
                die;
            }
        }
        $error_msg = "<p style='color:red;'> Please Enter Valid  Username or Password</p>";
    }
    else
    {
        $error_msg ="<p style='color:red;'> Please Enter Valid Username or Password</p>"; 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            padding: 90px;
            width: 400px;
        }
        .form-box h1 {
            margin: 0;
            text-align: center;
            font-size: 32px;
            color: #4caf50;
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
            <h1 class="text-center">Admin Login</h1><br>
            <form method='post' action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"><br><br>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"><br><br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php if(isset($error_msg)): ?>
                <div class="alert alert-danger mt-3"><?php echo $error_msg ?></div>
            <?php endif; ?>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
