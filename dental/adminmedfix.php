<!doctype html>
<html lang=th>
<head>
<title>เเก้ไขข้อมูลยา</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="adminmedfix.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เเก้ไขข้อมูลยา</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
// Make the query: 

$q = "SELECT medcode AS code,medname AS name ,unit AS unit, medtype AS mtype FROM adminmed";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table" style="margin-left: 20%;">
				<tr class="heading"><td class="col head"><b>รหัสยา</b></td class="col head"><td class="col head"><b>ชื่อยา</b></td><td class="col head"><b>จำนวน</b></td>
				<td class="col head"><b>ประเภทยา</b></td>
				<td class="col head"><b>เเก้ไข</b></td>
                <td class="last"><b>ลบ</b></td></tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['code'] . '</td><td class="col">'.  $row['name'] . '</td>
				<td class="col">'.  $row['unit'] . '</td><td class="col">'.  $row['mtype'] . '</td>
				<td class="col"><a href="edit_med.php?id=' . $row['code'] . '">เเก้ไข</a></td>
                <td class="last1"><a href="deletemed.php?id=' . $row['code'] . '">ลบ</a></td></tr>'; }
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