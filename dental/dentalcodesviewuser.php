<!doctype html>
<html lang=th>
<head>
<title>รายการทำฟัน</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="dentalcodesviewuser.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"></head>
</head>
<body>
	<img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">คลินิกทันตแพทย์วิสาขา</p>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page">รายการทำฟัน</h2>


<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.
$dbcon->set_charset("utf8mb4");
// Make the query: 

$q = "SELECT code AS code, 
unitcost AS cost,description AS descriptions, id As id FROM dentalcode 
";

$result = @mysqli_query ($dbcon, $q); // Run the query.

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table>
				<tr class="heading"><td class="col head"><b>รหัส</b></td><td class="col head"><b>ราคา(บาท)</b></td><td class=" last"><b>รายการ</b></td>
				
				</tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['code'] . '</td>
				<td class="col">' . $row['cost'] .'</td>
				<td class="last1">'.  $row['descriptions'] . '</td>
				</tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
     } // End of if ($result)

mysqli_close($dbcon); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>