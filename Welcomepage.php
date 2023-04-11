
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vehicle Registration</title>

        <style>
            /* navigation menu */
            .menu-bar {
                background-color: #262626;
                overflow: hidden;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 999;
            }
            .menu-bar ul {
                margin: 0;
                padding: 0;
                list-style-type: none;
                overflow: hidden;
                text-align: center;
            }
            .menu-bar li {
                display: inline-block;
            }
            .menu-bar li a {
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 18px;
                font-weight: bold;
                text-transform: uppercase;
                transition: all 0.3s ease;
            }
            .menu-bar li a:hover {
                background-color: #444444;
            }
            .menu-bar .active a {
                background-color: #4CAF50;
            }
            /* header */
            header {
                
                background-position: center;
                height: 100vh;
                background-size: cover;
                position: relative;
            }
            .header-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: #fff;
                text-align: center;
            }
            .header-content h1 {
                font-size: 72px;
                font-weight: bold;
                margin: 0;
                padding: 0;
            }
            .header-content p {
                font-size: 24px;
                margin: 20px 0 0;
                padding: 0;
            }
            /* footer */
            footer {
                background-color: #f2f2f2;
                text-align: center;
                padding: 20px;
            }
            /* welcome message */
            .welcome {
                margin-top: 50px;
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                color: #444;
            }
            /* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5s;
  animation-name: fade;
  animation-duration: 5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
        </style>
    </head>
    <body>
        <header>
            <div class="menu-bar">
                <ul>
                    <li class="active"><a href="#"><i class="ri-home-2-line"></i> Home Page</a></li>
                    <li><a href="about us.php">About us</a></li>
                    <li><a href="contactus.php">Contact us</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
            <li><a href="log.php" class="active"><i class="ri-user-line"></i>Sign In Or Sign Up </a></li>
        </ul>
     </div>
     <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="slide1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="slide2.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="slide3.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="slide4.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="slide5.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="slide6.jpg" style="width:100%">
  
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>

<footer>
  <p>Copyright &copy; 2020 Vehicle Registration And Reporting. All Rights Reserved.</p>
</footer>
    </body>
</html>