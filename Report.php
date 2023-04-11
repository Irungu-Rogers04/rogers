<!DOCTYPE html>
<html>
<head>
	<title>User Report</title>
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
  color: white;
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
</style>

</head>
<body>
	<h1>User Report</h1>
	<form method="post">
		<label for="id">Enter user ID:</label>
		<input type="text" name="id" id="id">
		<input type="submit" value="Search"><br>
	</form>

<?php
// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the user ID from the form
	$id = $_POST["id"];

	// Connect to database and retrieve user details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle database";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Prepare SQL statement
	$sql = "SELECT * FROM user_vehicle_registration WHERE idNo = '$id'";

	// Execute SQL statement and get result
	$result = $conn->query($sql);

	// Check if there is a result
	if ($result->num_rows > 0) {
		// Output data of each row
		while($row = $result->fetch_assoc()) {
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
		// Add button to report lost vehicle
		echo "<br><button><a href='report_lost_vehicle.php?id=".$id."'>Report Lost Vehicle</a></button>";
	} else {
		echo "<p style='color:red;'>User with That ID Not Found Please Enter A Valid ID!</p>";
        
	}

	// Close connection
	$conn->close();
}
?>
</body>
</html>