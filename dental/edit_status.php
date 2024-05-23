<!doctype html>
<html lang=th>
<head>
<title>Change The Status</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="signup.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">

	
<div id="content"><!--Start of the edit page content-->
<center><h2>ยืนยันการจอง</h2></center>

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
		echo '<p class="error">เกิดข้อผิดผลาด</p>';
		exit();
		}

require ('connect-mysql.php');
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
		$errors = array();


		// Look for the dental codes
        if (empty($_POST['status'])) {
		$errors[] = 'กรุณาใส่สถานะ';
		} else {
		$status = mysqli_real_escape_string($dbcon, trim($_POST['status']));
		}





		if (empty($errors)) 
		{ // If everything is OK, make the update query 
		// Check that the email is not already in the users table
		$q = "UPDATE appointement SET status='$status' WHERE ser=$id LIMIT 1";
		$result = @mysqli_query ($dbcon, $q);
		if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
		// Echo a message if the edit was satisfactory
		echo '<center><h3>อัพเดทสถานะเรียบร้อย</h3></center>';
		
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


$q = "SELECT regdate,status FROM appointement WHERE ser=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) 
{   // Valid user ID, display the form.
	// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
    // Display the name of the member being deleted
    echo "<center><h3>คุณแน่ใจว่าต้องการปรับข้อมูลวันที่ลงทะเบียนหรือไม่ $row[0]?</h3></center>";


	// Create the form
	echo '<form action="edit_status.php" method="post" style="margin-left:32%">
	<p><label class="label" for="status">สถานะ:</label>
	<select name="status" id="name"  >

        <option>ยืนยัน</option>
        <option>ยกเลิก</option>
    </select></p>   
	
	

	<p><input id="submit" type="submit" name="submit" value="Enter"></p>
	<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} 
else { // The record could not be validated
	  echo '<p class="error">This page has been accessed in error</p>';
	 }
mysqli_close($dbcon);

?>
</div>
</div>
</body>
</html>