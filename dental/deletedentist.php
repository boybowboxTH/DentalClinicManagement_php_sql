<?php
session_start();

?>
<!doctype html>
<html lang=th>
<head>
<title>ลบข้อมูลทันตแพทย์</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="includes.css">

</head>
<body>
<div id="container">

<div id="content"><!--Start of content for delete page-->
<center><h2>ลบข้อมูลทันตแพทย์</h2></center>
<?php
// Check for a valid user ID, through GET or POST
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { //Details from view_users.php
$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission #1
$id = $_POST['id'];
} else { // If no valid ID, stop the script
echo '<p class="error">เกิดข้อผิดพลาด</p>';

exit();
}
require ('connect-mysql.php');
// Has the form been submitted? #2
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if ($_POST['sure'] == 'ยืนยัน') { // Delete the record
// Make the query
$q = "DELETE FROM dentist WHERE did=$id LIMIT 1";
$result = @mysqli_query ($dbcon , $q);
if (mysqli_affected_rows($dbcon ) == 1) { // If there was no problem
// Display a message
echo '<center><h3>ลบเรียบร้อยเเล้ว</h3></center';
} else { // If the query failed to run
echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถลงทะเบียนได้ ขออภัยในความไม่สะดวก</p>'; // Display error message
echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>';
// Debugging message
}
} else { // Confirmation that the record was not deleted
echo '<center><h3>ยังไม่ได้ลบ</h3></center>';
}
} else { // Display the form
// Retrieve the member's data #3
$q = "SELECT name FROM dentist WHERE did=$id";
$result = @mysqli_query ($dbcon , $q);
if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form
// Get the member's data
$row = mysqli_fetch_array ($result, MYSQLI_NUM);
// Display the name of the member being deleted
echo "<center><h3>คุณแน่ใจว่าต้องการลบข้อมูลถาวรหรือไม่ $row[0]?</h3></center>";
// Display the delete page
echo '<form action="deletedentist.php" method="post" style="margin-left: 45%"> 
<input id="submit-yes" type="submit" name="sure" value="ยืนยัน">
<input id="submit-no" type="submit" name="sure" value="ยกเลิก">
<input type="hidden" name="id" value="' . $id . '">
</form>';
} else { // Not a valid member’s ID
echo '<p class="error">เกิดข้อผิดพลาด</p>';
echo '<p>&nbsp;</p>';
}
} // End of the main conditional section
mysqli_close($dbcon );

?>
</div>
</div>
</body>
</html>