<!DOCTYPE html>
<html>
<head>
<title>User Details</title>
<style type="text/css">
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("ROGERS 2.PNG");
  
 
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: #00ff5a;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}


h1 {
  font-size: 24px;
  font-weight: bold;
  color: #11c1c1;
  margin-top: 20px;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 10px;
}

a { 
  color: #0084ff;
  text-decoration: none;
  
}
button { 
  color: #1b00ff;
  text-decoration: none;
}
</style>

	
</head>
<body>


<div class="bg-image"></div>

<div class="bg-text">
<h1>Registered User Details</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="idNo">Enter User ID Number:</label>
		<input type="text" name="idNo" id="idNo">
		<input type="submit" name="submit" value="Check Details"><br><br>
	</form>

    <div class="car">

    </div>

	<?php
	// Check if form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get the user ID from the form
		$idNo = $_POST["idNo"];

		// Connect to database and retrieve user details
        $servername = "localhost";
        $username = "root";
        $password = " ";
        $dbname = "vehicle database";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Prepare SQL statement
		$sql = "SELECT * FROM user_vehicle_registration WHERE idNo = '$idNo'";

		// Execute SQL statement and get result
		$result = $conn->query($sql);

		// Check if there is a result
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) 
      {
                echo "<button>Firstname: " . $row["firstname"] . "</button><br>";
                echo "<button>Middlename: " . $row["middlename"] . "</button><br>";
                echo "<button>Lastname: " . $row["lastname"] . "</button><br>";
                echo "<button>PhoneNo: " . $row["phoneNo"] . "</button><br>";
                echo "<button>ID: " . $row["idNo"] . "</button><br>";
                echo "<button>Email: " . $row["email"] . "</button><br>";
                echo "<button>Date Of Birth: " . $row["dob"] . "</button><br>";
                echo "<button>Nationality: " . $row["nationality"] . "</button><br>";
                echo "<button>Status: " . $row["status"] . "</button><br>";
                echo "<button>County: " . $row["county"] . "</button><br>";
                echo "<button>Town: " . $row["town"] . "</button><br>";
                echo "<button>Street Address: " . $row["streetaddress"] . "</button><br>";
                echo "<button>Number Plate: " . $row["plateNo"] . "</button><br>";
                echo "<button>Vehicle Identification Number: " . $row["vin"] . "</button><br>";
                echo "<button>Engine Number: " . $row["engineNo"] . "</button><br>";
                echo "<button>Color: " . $row["color"] . "</button><br>";
                echo "<button>Model: " . $row["model"] . "</button><br>";
                echo "<button>Year Of Manufacture: " . $row["yearofmanufacture"] . "</button><br>";
				// add more fields as needed
			}
		} else {
			echo "<p style='color:red;'>User with ID " . $idNo . " Not Found Please Enter A Valid ID!</p>";
            
		}

		// Close connection
		$conn->close();
	}
	?>
</div>
	
</body>
</html>