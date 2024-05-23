<!doctype html>
<html lang=th>
<head>
<meta charset="UTF-8">
<title>เพื่มรายการยา</title>
<link rel="stylesheet" type="text/css" href="dentalcodes.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>



<?php
// This script performs an INSERT query that adds a record to the users table.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $code = trim($_POST['code']);
 $names = trim($_POST['names']);
 $units = trim($_POST['units']);
 $mtpye = trim($_POST['mtype']);

 require ('connect-mysql.php'); // Connect to the database. 

 // Make the query 
 
 $q = "INSERT INTO adminmed (medcode,medname,unit,medtype) VALUES ('$code','$names','$units','$mtpye')"; 

 $result = @mysqli_query ($dbcon, $q); // Run the query. 

 if ($result) { // If it ran OK. 
header ("location: admin.php");
 

 exit(); 
//End of SUCCESSFUL SECTION
 }

 else {                             // If the form handler or database table contained errors 
                                   // Display any error message
	 echo '<h2 class="error">System Error</h2>
	 <p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถลงทะเบียนได้ ขออภัยในความไม่สะดวก</p>';

      } // End of if clause ($result)

mysqli_close($dbcon); // Close the database connection.

exit();
 

} // End of the main Submit conditional.
?>


<h2 class="title">เพื่มรายการยา</h2> 
<!--display the form on the screen-->
<form action="adminmedadd.php" method="post" class="form">

<p><label class="label" for="code">รหัส:</label>
<input  type="text" name="code" size="30" maxlength="30" 
value="<?php if (isset($_POST['code'])) echo $_POST['code']; ?>"></p>

<p><label class="label" for="names">ชื่อยา:</label>
<input  type="text" name="names" size="30" maxlength="40" 
value="<?php if (isset($_POST['names'])) echo $_POST['names']; ?>"></p>

<p><label class="label" for="units">จำนวน:</label>
<input  type="text" name="units" size="30" maxlength="60" 
value="<?php if (isset($_POST['units'])) echo $_POST['units']; ?>" > </p>

<p><label class="label" for="mtype">ประเภทยา:</label><select name="mtype" value="<?php if (isset($_POST['mtype'])) echo $_POST['mtype']; ?>">
  <option>ยาน้ำ</option>
  <option>ยาทา</option>
  <option>ยารับประทาน</option>
  
</select></p>

<p><input id="submit" type="submit" name="submit" value="ลงทะเบียน"></p>
</form><!-- End of the page content. -->
</p>




</body>
</html>