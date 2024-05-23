<?php
session_start(); 

$use = $_SESSION['userid']; 
?>
<!doctype html>
<html lang="th">
<head>
<title>รายการประวัติการรักษา</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="cliniceditadmin.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(function() {
     $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
 });
</script>
<style>
h2 {text-align: center;}
form {text-align: center;
      margin-top: 150px;
}
</style>
</head>
<body>

<h2 class="page">&nbsp;&nbsp;&nbsp;&nbsp;ประวัติการรักษา</h2>
<form action="medrecordview.php" method="post" class="form">

 <?php
 $dbcon = new mysqli("localhost", "root", "", "dentalclinic");
 $dbcon->set_charset("utf8mb4");
 if ($dbcon->connect_error) {
     die("Failed to connect to MySQL: " . $dbcon->connect_error);
 }
 ?>
<?php
$query = "SELECT DISTINCT username FROM medrecord";
$result = $dbcon->query($query);
?>

<label for="username">ชื่อ: 
<select name="username" id="username">
    <?php
    while ($line = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($line['username'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($line['username'], ENT_QUOTES, 'UTF-8') . '</option>';
    }
    ?>
</select>
</label><br><br>

<input id="submit" type="submit" name="submit" value="ยืนยัน">
<a href="admin.php" class="btn" style="margin: 0px auto;">กลับ</a></div>
</form>

<?php
function convert_to_text($date_str) {
    $date_obj = DateTime::createFromFormat('Y-m-d', $date_str);
    if ($date_obj === false) {
        error_log("Error converting date: $date_str");
        return "Invalid date format";
    }
    return $date_obj->format('j F, Y');
}

if (isset($_POST['username'])) {
    $username = $dbcon->real_escape_string($_POST['username']);

    $q = "SELECT * FROM medrecord WHERE username='$username'";
    $result = $dbcon->query($q);

    if ($result) {
        echo '<table class="table" style="margin: 20px 10% 15px;">
                <tr class="heading">
                   
                    <td class="col head"><b>รหัสรักษา</b></td>
                    <td class="col head"><b>ชื่อทันตแพทย์</b></td>
                    <td class="col head"><b>วันที่นัด</b></td>
                    <td class="col head"><b>เวลา</b></td>
                    <td class="col head"><b>สาขา</b></td>
                    <td class="col head"><b>ยา</b></td>
                    <td class="col head"><b>รายละเอียด</b></td>
                    <td class="col head"><b>ราคา</b></td>
                </tr>';
        while ($row = $result->fetch_assoc()) {
            $text_date = convert_to_text($row['regdate']);
            echo '<tr class="heading2">
                    
                    <td class="col">' . htmlspecialchars($row['code'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['dentist'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($text_date, ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['regtime'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['cname'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['medname'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['results'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="col">' . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . '</td>
                  </tr>';
        }
        echo '</table>';
        $result->free();
    } else {
        echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถแสดงข้อมูลได้ ขออภัยในความไม่สะดวก</p>';
        echo '<p>' . $dbcon->error . '<br><br>Query: ' . $q . '</p>';
    }
}

$dbcon->close();
?>

</body>
</html>
