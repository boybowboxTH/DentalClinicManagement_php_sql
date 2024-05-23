<!doctype html>
<html lang=th>
<head>
<meta charset="UTF-8">
<title>ยืนยันการจอง</title>
<link rel="stylesheet" type="text/css" href="confirmappoint.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>


<div id="container">


<div id="content"><!-- Start of the content of the table of users page. -->
<h2 class="page" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยืนยันการจอง</h2>

<?php
function convert_to_text($date_str) {
	// 1. Check for invalid date format in database (optional)
	// You can uncomment this if you suspect issues with data retrieval
	/*
	if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date_str)) {
		return "Invalid date format in database"; // Or handle differently
	}
	*/
  
	// 2. Check the return value of `createFromFormat`
	$date_obj = DateTime::createFromFormat('Y-m-d', $date_str);
  
	if ($date_obj === false) {
		// Handle the case where `createFromFormat` returns false
		// You can log the error, return a default value, etc.
		error_log("Error converting date: $date_str");
		return "Invalid date format"; // Or handle differently
	}
  
	// 3. Format the date as desired
	$text_date = $date_obj->format('j F, Y');
  
	return $text_date;
  }
$text_date = ""; // ประกาศตัวแปร

require('connect-mysql.php');
$dbcon->set_charset("utf8mb4");
$q = "SELECT * FROM appointement";
$result = mysqli_query($dbcon, $q);

if ($result) {
    echo '<table class="table" style="margin-left: 2%;">
            <tr class="heading">
                <td class="col head"><b>รหัส</b></td>
                <td class="col head"><b>ชื่อคนไข้</b></td>
                <td class="col head"><b>ชื่อทัตเเพทย์</b></td>
                <td class="col head"><b>วันที่นัด</b></td>
                <td class="col head"><b>เวลาที่นัด</b></td>
                <td class="col head"><b>ยืนยัน</b></td>
            </tr>';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $text_date = convert_to_text($row['regdate']);
        echo '<tr class="heading2">
                <td class="col">' . $row['code'] . '</td>
                <td class="col">' . $row['username'] . '</td>
                <td class="col">' . $row['dentist'] . '</td>
                <td class="col">' . $text_date . '</td>
                <td class="col">' . $row['regtime'] . '</td>
                <td class="col">' . $row['status'] . '</td>
                <td class="last1"><a class="und" href="edit_status.php?id=' . $row['ser'] . '">เเก้ไข</a></td>
            </tr>';
    }
    echo '</table>';
    mysqli_free_result($result);
} else {
    echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถลงทะเบียนได้ ขออภัยในความไม่สะดวก</p>';
    echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
}

mysqli_close($dbcon);
?>


</div><!-- End of the user’s table page content -->

</div>
</body>
</html>