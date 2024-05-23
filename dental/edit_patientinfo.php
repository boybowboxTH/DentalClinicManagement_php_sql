<!doctype html>
<html lang=th>
<head>
<title>เเก้ไขรายละเอียดคนไข้</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="signup.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<center><h2>แก้ไขข้อมูลคนไข้</h2></center>

<?php
		// After clicking the Edit link in the found_record.php page, the editing interface appears
		// The code looks for a valid user ID, either through GET or POST #1
		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
		$id = $_GET['id'];
		} 
		elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission
		$id = $_POST['id'];
		} 
		else { // If no valid ID, stop the script
		echo '<p class="error">เกิดข้อผิดพลาด</p>';
		exit();
		}

require ('connect-mysql.php');
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['name'])) {
		$errors[] = 'กรุณาใส่ชื่ออีกครั้ง';
		} else {
		$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
		}


		
		// Look for the descriptions
		if (empty($_POST['age'])) {
		$errors[] = 'กรุณาใส่อายุอีกครั้ง';
		} else {
		$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
		}


		// Look for the descriptions
		if (empty($_POST['phone'])) {
		$errors[] = 'กรุณาใส่เบอร์โทรอีกครั้ง';
		} else {
		$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
		}


       // Look for the descriptions
		if (empty($_POST['email'])) {
		$errors[] = 'กรุณาใส่อีเมล์อีกครั้ง';
		} else {
		$email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
		}


        // Look for the descriptions
		if (empty($_POST['address'])) {
		$errors[] = 'กรุณาใส่ที่อยู่อีกครั้ง';
		} else {
		$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
		}



		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$q = "UPDATE signup SET name='$name', age='$age' , phone='$phone' ,email='$email' , address='$address' WHERE userid=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<center><h3>เเก้ไขเรียบร้อย</h3></center>';
		} else { // Echo a message if the query failed
		echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถลงทะเบียนได้ ขออภัยในความไม่สะดวก</p>'; // Error message.
		echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		} // End of if ($result)
		mysqli_close($dbcon); // Close the database connection.
		// Include the footer and quit the script:
		
		exit();
		} else   { // Display the errors.
		echo '<p class="error">The following error(s) occurred:<br />';
        
		foreach ($errors as $msg) { // Extract the errors from the array and echo them
		echo " - $msg<br>\n";
	    }
		echo '</p><p>กรุณาลองอีกครั้ง</p>';
		} // End of if (empty($errors))section
}        // End of the conditionals
         // Select the record 


$q = "SELECT userid,name,age,phone,email,address FROM signup WHERE userid=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<br><form action="edit_patientinfo.php" method="post" style="margin-left: 25%;">
	<p><label class="label" for="name">ชื่อ:</label>
	<input class="fl-left" id="name" type="text" name="name" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
	<p><label class="label" for="age">อายุ:</label>
	<input class="fl-left" type="text" name="age" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	<p><label class="label" for="phone">เบอร์โทร:</label>
	<input class="fl-left" type="text" name="phone" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<p><label class="label" for="email">อีเมล์:</label>
	<input class="fl-left" type="text" name="email" size="30" maxlength="50" 
	value="' . $row[4] . '"></p>
	<p><label class="label" for="address">ที่อยู่:</label>
	<input class="fl-left" type="text" name="address" size="30" maxlength="50" 
	value="' . $row[5] . '"></p>
	<p><input id="submit" type="submit" name="submit" value="แก้ไข"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { // The record could not be validated
	  echo '<p class="error">เกิดข้อผิดพลาด</p>';
	 }
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>