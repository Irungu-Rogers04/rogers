<?php
session_start();

include("conn.php");
include("functions.php");

$user_data=check_login($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device=width, initial- scale=10">
    <title>Vehicle Registration</title>
   
    
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-image: url("slide3.jpg");
   
 }
    .topnav {
  overflow: hidden;
  background-color: #009602;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
    

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
   
}
.footer a{
    display:flex;
}
</style>
</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
 
  <div class="dropdown">
  <button class="dropbtn">Services 
  <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
  <a href="registration.php">Registration</a>
  <a href="Report.php">Report Stolen Vehicle</a>
  </div>
  </div> 
  <a href="about us.php">About us</a>
  <a href="contactus.php">Contact us</a>
  <a href="faqs.html">FAQs</a>
 
 
  <div class="menu-bar">
                <a href="#" class="dropbtn"><i class="ri-user-line"></i><?php echo $user_data['username']; ?></a>
                <div class="sub-menu-1">
                <a href="logout.php">Log out</a>
                </div>
  </div>
</div>




<div class="footer">
<div class="topnav" id="myTopnav">
 
 
  
  <a href="about us.php">About us</a>
  <a href="contactus.php">Contact us</a>
  <a href="faqs.html">FAQs</a>
  
</div>
</div>
<?php?>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

    
</body>
</html>
