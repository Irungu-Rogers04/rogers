<?php
include("conn.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      /* Add CSS styles here */
      /* Add CSS styles here */
      body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        
        background-image: linear-gradient(rgba(4,9,30,0.7)),url('ROGERS M.PNG');
        background-position: center;
  
        color: #fff;
        line-height: 1.5;
        margin: 0;
        padding: 0;
      }
     
      h1 {
        margin: 0;
        font-size: 36px;
      }
      main {
        margin: 20px;
      }
      nav ul li a{
        color:greenyellow;
      }
      h2 {
        font-size: 24px;
      }
      ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }
      li {
        margin: 20px 0;
        
      }
      .image-box {
        text-align: center;
        margin-top: 20px;
      }
      img {
        max-width: 100%;
        height: auto;
      }
      footer {
    background-color: #f2f2f2;
    text-align: center;
    padding: 10px;
    color:black;
  }
    </style>
  </head>
  <body>

    <main>
        <section id="description">
        

            <div class="image">
            <img src="ROGERS M.PNG" alt="" />
            </div>
      <section id="options">

      <nav>
        <ul>
          <li><a href="welcomepage.php">Home</a></li>
          <li><a href="about us.php">About Us</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="faqs.html">FAQs</a></li>
        </ul>
      </nav>
    </main>
    <footer>
  <p>&copy; 2023 Vehicle License Registration System. All rights reserved.</p>
</footer>
</body>
</html>
