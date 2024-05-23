<?php
session_start(); 

$use = $_SESSION['userid']; // กำหนดค่าให้กับตัวแปร $use

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dentalclinic";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ensure the connection uses UTF-8
    $conn->exec("SET NAMES 'utf8mb4'");
    $conn->exec("SET CHARACTER SET utf8mb4");

    $sql = "SELECT name FROM signup WHERE userid = :userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userid', $use); // ใช้ $use แทน $_SESSION['userid']
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user !== false) {
        $name = $user['name'];
    } else {
        // Handle the case where no user is found
        $name = "User Not Found";
    }
} catch(PDOException $e) {
    echo "เกิดข้อผิดพลาด: " . $e->getMessage();
}
?>

<?php
// Connect to the database using MySQLi
$dbcon = new mysqli("localhost", "root", "", "dentalclinic");
if ($dbcon->connect_error) {
    die("Connection failed: " . $dbcon->connect_error);
}
$dbcon->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codes = $dbcon->real_escape_string(trim($_POST['codes']));
    $dent = $dbcon->real_escape_string(trim($_POST['dent']));
    $dates = $dbcon->real_escape_string(trim($_POST['dates']));
    $time = $dbcon->real_escape_string(trim($_POST['time']));

    $q = "INSERT INTO appointement (userid, username, code, dentist, regdate, regtime, status)
          VALUES ('$use', '$name', '$codes', '$dent', '$dates', '$time', 'ยังไม่ได้ยืนยัน')";
    $result = $dbcon->query($q);

    if ($result) {
        header("location: index1.php");
        exit();
    } else {
        echo '<h2>System Error</h2>
              <p class="error">ไม่สามารถทำการลงทะเบียนได้เนื่องจากข้อผิดพลาดของระบบ ขอโทษในความไม่สะดวก</p>';
        echo '<p>' . $dbcon->error . '<br><br>Query: ' . $q . '</p>';
    }

    $dbcon->close();
    exit();
}
?>

<!doctype html>
<html lang="th">
<head>
    <title>ดำเนินการจอง</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="appointement.css">
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
</head>
<body>
    <img src="download.png" width="40" height="40" class="logo">
    <p class="logotext">คลินิกทันตแพทย์วิสาขา</p>
    <h2 class="page">สร้างการจอง</h2>
    <form action="appointement.php" method="post" class="form">
        <?php
        $query = "SELECT CONCAT(code, '-', description) AS codes FROM dentalcode";
        $result = $dbcon->query($query);
        ?>
        <label for="codes">รหัส:<select name="codes"  value="<?php if (isset($_POST['codes'])) echo $_POST['codes']; ?>" >
        <?php
        while ($line = $result->fetch_assoc()) {
            echo '<option>' . htmlspecialchars($line['codes'], ENT_QUOTES, 'UTF-8') . '</option>';
        }
        ?>
        </select></label><br><br>

        <?php
        $query = "SELECT CONCAT(did, '-', name) AS dent FROM dentist";
        $result = $dbcon->query($query);
        ?>
        <label for="dent">ทันตแพทย์:<select name="dent" value="<?php if (isset($_POST['dent'])) echo $_POST['dent']; ?>" >
        <?php
        while ($line = $result->fetch_assoc()) {
            echo '<option>' . htmlspecialchars($line['dent'], ENT_QUOTES, 'UTF-8') . '</option>';
        }
        ?>
        </select><br><br>

        <label for="dates">วันที่:</label>
        <input type="text" id="datepicker" name="dates" value="<?php if (isset($_POST['regdate'])) echo $_POST['regdate']; ?>" ><br><br>

        <label>เวลา:</label> 
        <select name="time" id="hall" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>" >
            <option>9 AM</option>
            <option>10 AM</option>
            <option>11 AM</option>
            <option>12 PM</option>
            <option>1 PM</option>
            <option>2 PM</option>
            <option>3 PM</option>
            <option>4 PM</option>
            <option>5 PM</option>
            <option>6 PM</option>
            <option>7 PM</option>
        </select><br><br>

        <input id="submit" type="submit" name="submit" value="ยืนยัน">
    </form>
</body>
</html>
