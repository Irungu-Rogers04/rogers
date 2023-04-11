<?php
session_start();
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // check if all required fields are filled
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $idNo = $_POST['idNo'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $county = $_POST['county'];
    $town = $_POST['town'];
    $streetaddress = $_POST['streetaddress'];
    $plateNo = $_POST['plateNo'];
    $vin = $_POST['vin'];
    $engineNo = $_POST['engineNo'];
    $color = $_POST['color'];
    $model = $_POST['model'];
    $status = $_POST['status'];
    $yearofmanufacture = $_POST['yearofmanufacture'];
    if (!empty($firstname) && !empty($lastname) && !empty($idNo) && !empty($phoneNo) && !empty($email) && !empty($dob) && !empty($nationality) && !empty($county) && !empty($town) && !empty($streetaddress) && !empty($plateNo) && !empty($vin) && !empty($engineNo) && !empty($color) && !empty($model) && !empty($yearofmanufacture) && !empty($status) ) 
    {
      // insert data into database
      $query = "INSERT INTO user_vehicle_registration(firstname, middlename, lastname, idNo, phoneNo, email, dob, nationality, county, town, streetaddress, plateNo, vin, engineNo, color, model, yearofmanufacture,status) VALUES ('$firstname', '$middlename', '$lastname', '$idNo', '$phoneNo', '$email', '$dob', '$nationality', '$county', '$town', '$streetaddress', '$plateNo', '$vin', '$engineNo', '$color', '$model', '$yearofmanufacture','status')";
      if (mysqli_query($conn, $query)) {
        // display success message and redirect to success page
        echo "User vehicle registration data has been successfully saved!";
        die();
    } 
    else {
        $error_message = mysqli_error($conn);
        if (strpos($error_message, 'Duplicate entry') !== false && strpos($error_message, 'for key \'idNo\'') !== false)
         {
            // display message that idNo already exists
            echo "The ID number you entered already exists for another user.";
        } 
        elseif (strpos($error_message, 'Duplicate entry') !== false && strpos($error_message, 'for key \'plateNo\'') !== false)
         {
            // display message that plateNo already exists
            echo "The plate number you entered already exists for another vehicle.";
        } 
        else {
            // display general error message
            echo "Error: " . $query . "<br>" . $error_message;
        }
    }
    
    } else {
      echo "Please enter all required fields.";
    }
  }

?>
<!DOCTYPE html>
<style>
    body{

   background-image: url("slide3.jpg");

   
 }
 </style>
<html>
    <link rel="stylesheet" href="stylevehicle.css">
    <body>
        <div class="reg">
        <form method="post">
             
            <div>
                <p><h4><u><b>Customer Information.</b></u></h4></p>
            First Name<input type="text" id="firstname" name="firstname" required><br>
            Middle Name<input type="text" id="middlename" name="middlename" required><br>
            Last Name<input type="text" id="lastname" name="lastname" required><br>
            Phone Number<input type="text" id="phonenumber" name="phoneNo" required><br>
            Identification Number<input type="text" id="IdNo" name="idNo" required><br>
            Email<input type="email" id="email" name="email" required><br>
            Date of Birth<input type="date" name="dob" required><br>
            Nationality<input type="text" id="nationality" name="nationality" required><br>
            Status<input type="status" id="status" name="status" required><br>
            County
            <select name="county" id="county" required>
                <option value="Baringo">Baringo</option>
                <option value="Bomet">Bomet</option>
                <option value="Bungoma">Bungoma</option>
                <option value="Busia">Busia</option>
                <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
                <option value="Embu">Embu</option>
                <option value="Garissa">Garissa</option>
                <option value="Homa Bay">Homa Bay</option>
                <option value="Isiolo">Isiolo</option>
                <option value="Kajiado">Kajiado</option>
                <option value="Kakamega">Kakamega</option>
                <option value="Kericho">Kericho</option>
                <option value="Kiambu">Kiambu</option>
                <option value="Kilifi">Kilifi</option>
                <option value="Kirinyaga">Kirinyaga</option>
                <option value="Kisii">Kisii</option>
                <option value="Kisumu">Kisumu</option>
                <option value="Kitui">Kitui</option>
                <option value="Kwale">Kwale</option>
                <option value="Laikipia">Laikipia</option>
                <option value="Lamu">Lamu</option>
                <option value="Machakos">Machakos</option>
                <option value="Makueni">Makueni</option>
                <option value="Mandera">Mandera</option>
                <option value="Meru">Meru</option>
                <option value="Migori">Migori</option>
                <option value="Marsabit">Marsabit</option>
                <option value="Mombasa">Mombasa</option>
                <option value="Muranga">Muranga</option>
                <option value="Nairobi">Nairobi</option>
                <option value="Nakuru">Nakuru</option>
                <option value="Nandi">Nandi</option>
                <option value="Narok">Narok</option>
                <option value="Nyamira">Nyamira</option>
                <option value="Nyandarua">Nyandarua</option>
                <option value="Nyeri">Nyeri</option>
                <option value="Samburu">Samburu</option>
                <option value="Siaya">Siaya</option>
                <option value="Taita Taveta">Taita Taveta</option>
                <option value="Tana River">Tana River</option>
                <option value="Tharaka Nithi">Tharaka Nithi</option>
                <option value="Trans Nzoia">Trans Nzoia</option>
                <option value="Turkana">Turkana</option>
                <option value="Uasin Gishu">Uasin Gishu</option>
                <option value="Vihiga">Vihiga</option>
                <option value="Wajir">Wajir</option>
                <option value="West Pokot">West Pokot</option>
                
            </select>
            Town<input type="text" id="town" name="town" required><br>
            Street Address<input type="text" id="streetaddress" name="streetaddress"><br>

            </div>

            <div>
                <p><h4><u><b> Information About the Vehicle.</b></u></h4></p>
                Enter Vehicle Plate Number<input type="text" id="plateNo" name="plateNo" required><br>
                Enter Engine Number<input type="text" id="engineNo" name="engineNo" required><br>
                Enter Vehicle Identification Number<input type="text" id="VIN" name="vin" required><br>

            <p>Vehicle color</p>
            <select name="color">
                <option value="AliceBlue" style="background-color:AliceBlue">AliceBlue</option>
                <option value="AntiqueWhite" style="background-color:AntiqueWhite">AntiqueWhite</option>
                <option value="Aquamarine" style="background-color:Aquamarine">Aquamarine </option>
                <option value="Azure" style="background-color:Azure">Azure</option>
                <option value="Bisque" style="background-color:Bisque">Bisque</option>
                <option value="Black" style="background-color:Black; color:#FFFFFF">Black</option>
                <option value="BlanchedAlmond" style="background-color:BlanchedAlmond">BlanchedAlmond</option>
                <option value="CornflowerBlue" style="background-color:CornflowerBlue">CornflowerBlue</option>
                <option value="MidnightBlue" style="background-color:MidnightBlue">MidnightBlue</option>
                <option value="MintCream" style="background-color:MintCream">MintCream</option>
                <option value="MistyRose" style="background-color:MistyRose">MistyRose</option>
                <option value="Moccasin" style="background-color:Moccasin">Moccasin</option>
                <option value="NavajoWhite" style="background-color:NavajoWhite">NavajoWhite</option>
                <option value="Navy" style="background-color:Navy">Navy</option>
                <option value="OldLace" style="background-color:OldLace">OldLace</option>
                <option value="Olive" style="background-color:Olive">Olive</option>
                <option value="PaleGoldenRod" style="background-color:PaleGoldenRod">PaleGoldenRod</option>
                <option value="PaleGreen" style="background-color:PaleGreen">PaleGreen</option>
                <option value="PaleTurquoise" style="background-color:PaleTurquoise">PaleTurquoise</option>
                <option value="PaleVioletRed" style="background-color:PaleVioletRed">PaleVioletRed</option>
                <option value="PapayaWhip" style="background-color:PapayaWhip">PapayaWhip</option>
                <option value="PeachPuff" style="background-color:PeachPuff">PeachPuff</option>
                <option value="Peru" style="background-color:Peru">Peru</option>
                <option value="Pink" style="background-color:Pink">Pink</option>
                <option value="Plum" style="background-color:Plum">Plum</option>
                <option value="YellowGreen" style="background-color:YellowGreen">YellowGreen</option>
            </select><br>
            <p>Type of car</p>
            <select id="model" name="model">
                <option value="Smart">Smart</option>
                <option value="Sterling">Sterling</option>
                <option value="Subaru">Subaru</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Tesla">Tesla</option>
                <option value="Toyota">Toyota</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Volvo">Volvo</option>
                <option value="Yugo">Yugo</option>
            </select><br>
            <p>Year of Manufacture</p>
            <select id="year" name="yearofmanufacture">

                <option value="2023">2023</option>
		        <option value="2022">2022</option>
		        <option value="2021">2021</option>
		        <option value="2020">2020</option>
		        <option value="2019">2019</option>
		        <option value="2018">2018</option>
		        <option value="2017">2017</option>
		        <option value="2016">2016</option>
		        <option value="2015">2015</option>
		        <option value="2014">2014</option>
		        <option value="2013">2013</option>
		        <option value="2012">2012</option>
		        <option value="2011">2011</option>
		        <option value="2010">2010</option>
		        <option value="2009">2009</option>
		        <option value="2008">2008</option>
		        <option value="2007">2007</option>
		        <option value="2006">2006</option>
		        <option value="2005">2005</option>
		        <option value="2004">2004</option>
		        <option value="2003">2003</option>
		        <option value="2002">2002</option>
		        <option value="2001">2001</option>
		        <option value="1998">1998</option>
		        <option value="1997">1997</option>
		        <option value="1996">1996</option>
		        <option value="1995">1995</option>
		        <option value="1994">1994</option>
		        <option value="1993">1993</option>
		        <option value="1992">1992</option>
		        <option value="1991">1991</option>
		        <option value="1990">1990</option>
		        <option value="1989">1989</option>
	 	        <option value="1988">1988</option>
		        <option value="1987">1987</option>
		        <option value="1986">1986</option>
		        <option value="1985">1985</option> 
		        <option value="1984">1984</option>
		        <option value="1983">1983</option>
		        <option value="1982">1982</option>
		        <option value="1981">1981</option>
		        <option value="1980">1980</option> 
		        <option value="1979">1979</option>
		        <option value="1978">1978</option>
            </select><br>
           

            <button type="submit" name="submit">Register</button>


        </form>
       

            </div>
        </div>

    </body>            
</html>
            
            