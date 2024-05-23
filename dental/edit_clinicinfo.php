<!doctype html>
<html lang=th>
<head>
<title>แก้ไขข้อมูลสาขา</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="Clinic.css">

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<h2 style="margin-left: 42%;">แก้ไขข้อมูลสาขา</h2>

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
		echo '<p class="error">เกิดนข้อผิดพลาด</p>';
		exit();
		}

require ('connect-mysql.php');
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['cname'])) {
		$errors[] = 'กรุณากรอกชื่ออีกครั้ง';
		} else {
		$cname = mysqli_real_escape_string($dbcon, trim($_POST['cname']));
		}


		


		// Look for the descriptions
		if (empty($_POST['location'])) {
		$errors[] = 'กรุณากรอกสถานที่อีกครั้ง';
		} else {
		$location = mysqli_real_escape_string($dbcon, trim($_POST['location']));
		}


		// Look for the descriptions
		if (empty($_POST['openhr'])) {
		$errors[] = 'กรุณากรอกเวลาเปิดอีกครั้ง';
		} else {
		$openhr = mysqli_real_escape_string($dbcon, trim($_POST['openhr']));
		}


       // Look for the descriptions
		if (empty($_POST['closehr'])) {
		$errors[] = 'กรุณากรอกเวลาปิดอีกครั้ง';
		} else {
		$closehr = mysqli_real_escape_string($dbcon, trim($_POST['closehr']));
		}


        // Look for the descriptions
		if (empty($_POST['rooms'])) {
		$errors[] = 'กรุณากรอกจำนวนห้องอีกครั้ง';
		} else {
		$rooms = mysqli_real_escape_string($dbcon, trim($_POST['rooms']));
		}


		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$q = "UPDATE clinic SET cname='$cname', location='$location',openhr='$openhr',closehr='$closehr',rooms='$rooms' WHERE cid=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<center><h3>แก้ไขเรียบร้อย</h3></center>';
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
		echo '</p><p>กรุณาลองใหม่อีกครั้ง</p>';
		} // End of if (empty($errors))section
}        // End of the conditionals
         // Select the record 


$q = "SELECT cid,cname,location,openhr,closehr,rooms FROM clinic WHERE cid=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
	// Create the form
	echo '<br><br><form action="edit_clinicinfo.php" method="post" style="margin-left: 25%;">
	<p><label class="label" for="cname">ชื่อสาขา:</label>
	<input class="fl-left" id="name" type="text" name="cname" size="30" maxlength="30" 
	value="' . $row[1] . '"></p>
	
	<p><label class="label" for="location">สถานที่:</label>
	<input class="fl-left" type="text" name="location" size="30" maxlength="50" 
	value="' . $row[2] . '"></p>
	<p><label class="label" for="openhr">เวลาเปิด:</label>
	<input class="fl-left" type="text" name="openhr" size="30" maxlength="50" 
	value="' . $row[3] . '"></p>
	<p><label class="label" for="closehr">เวลาปิด:</label>
	<input class="fl-left" type="text" name="closehr" size="30" maxlength="50" 
	value="' . $row[4] . '"></p>
	<p><label class="label" for="rooms">จำนวนห้อง:</label>
	<input class="fl-left" type="text" name="rooms" size="30" maxlength="50" 
	value="' . $row[5] . '"></p>
	

	<p><input id="submit" type="submit" name="submit" value="เเก้ไข"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { // The record could not be validated
	  echo '<p class="error">เกิดข้แผิดพลาด</p>';
	 }
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>