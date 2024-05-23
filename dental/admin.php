<?php
session_start();
$use = $_SESSION['userid']; // กำหนดค่าให้กับตัวแปร $use
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dentalclinic";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ดึงชื่อผู้ใช้
    $sql = "SELECT name FROM signup WHERE userid = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userid', $use);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // ดึงจำนวนผู้ใช้ทั้งหมด
    $sqlTotal = "SELECT count(userid) as usertotal FROM signup";
    $stmtTotal = $conn->prepare($sqlTotal);
    $stmtTotal->execute();
    $data = $stmtTotal->fetch(PDO::FETCH_ASSOC);

    // ดึงจำนวนรวมของราคา
    $sqlTotal1 = "SELECT SUM(price) as pricetotal FROM medrecord";
    $stmtTotal1 = $conn->prepare($sqlTotal1);
    $stmtTotal1->execute();
    $data1 = $stmtTotal1->fetch(PDO::FETCH_ASSOC);

    if ($user !== false) {
        $name = $user['name'];
        // แปลงข้อมูลเป็น UTF-8 ก่อนแสดงผล (ถ้าจำเป็น)
        $name = utf8_encode($name);
    } else {
        // Handle the case where no user is found
        $name = "กรุณาล็อกอินใหม่";
    }
} catch(PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <title>การจัดการเว็บไซต์</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <style>
.bottom {text-align: center;}
.left{margin-top: 100px;}
.right{margin-top: 100px;}
body{background-color: #CCFFFF;}
</style>
</head>

<body>
    <marquee direction="left" style="color: black; font-size: 20px;"> คลินิกทัตเเพทย์วิสาขา ยินดีต้อนรับ <?php echo "วันนี้วัน " . date("l");?> จำนวนคนไข้ทั้งหมด <?php echo $data['usertotal'];?> คน  ยอดทั้งหมด <?php echo $data1['pricetotal'];?> บาท</marquee><br><br>
    <a href="index.html" class="logout">Logout</a>
    <img src="visakha.jpg" class="img">
<div class="right">
    <a href="patienteditadmin.php" class="sublink r4">เเก้ไขรายละเอียดคนไข้</a><br><br>
    <a href="dentisteditadmin.php" class="sublink r1">เเก้ไขทัตเเพทย์</a><br><br>
    <a href="cliniceditadmin.php" class="sublink r2">เเก้ไขรายละเอียดสาขา</a><br><br>
    <a href="adminmedfix.php" class="sublink r3">เเก้ไขข้อมูลยา</a>
</div>
<div class="left">
    <a href="dentistaddadmin.php" class="sublink l6">เพื่มข้อมูลคนไข้</a><br><br>
    <a href="appointementadmin.php" class="sublink l7">เพื่มข้อมูลการจอง</a><br><br>
    <a href="dentist.php" class="sublink l1">เพิ่มทัตเเพทย์</a><br><br>
    <a href="staff.php" class="sublink l2">เพื่มผู้ดูแล</a><br><br>
    <a href="clinic.php" class="sublink l3">เพื่มสาขา</a><br><br>
    <a href="dentalcodes.php" class="sublink l4">เพื่มรายการทันตกรรม</a><br><br>
    <a href="adminmedadd.php" class="sublink l5">เพื่มรายการยา</a>
</div>
<div class="bottom">
    <a href="confirmappoint.php" class="bottoma">ยืนยันการจอง</a>
    <a href="medrecord.php" class="bottoma">เพื่มประวัติการรักษา</a>
    <a href="medrecordview.php" class="bottoma">รายการประวัติการรักษา</a>
</div>
</body>
</html>
