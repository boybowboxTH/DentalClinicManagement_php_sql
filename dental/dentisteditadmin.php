<!doctype html>
<html lang=th>
<head>
<title>เเก้ไขข้อมูลทันตแพทย์</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="dentisteditadmin.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">เเก้ไขข้อมูลทันตแพทย์</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT name AS name,age AS age ,sex AS sex,phone AS phone,email AS email,address AS address ,dtype AS dtype,did  FROM dentist";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>ชื่อ</b></td class="col head"><td class="col head"><b>อายุ</b></td><td class="col head"><b>เพศ</b></td>
				<td class="col head"><b>อีเมล์</b></td>
				<td class="col head"><b>ที่อยู่</b></td><td class="col head"><b>เบอร์โทร</b></td><td class="col head"><b>ตำแหน่ง</b></td><td class="col head"><b>เเก้ไข</b></td>
                <td class="last"><b>ลบ</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td><td class="col">'.  $row['age'] . '</td>
				<td class="col">'.  $row['sex'] . '</td><td class="col">'.  $row['email'] . '</td>
				<td class="col">'.  $row['address'] . '</td><td>'.  $row['phone'] . '</td>
				<td class="col">'.  $row['dtype'] . '</td>
				<td class="col"><a href="edit_dentistinfo.php?id=' . $row['did'] . '">เเก้ไข</a></td>
                <td class="last1"><a href="deletedentist.php?id=' . $row['did'] . '">ลบ</a></td></tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถลงทะเบียนได้ ขออภัยในความไม่สะดวก</p>';
		// Debug message:
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } // End of if ($result)

mysqli_close($dbcon); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>