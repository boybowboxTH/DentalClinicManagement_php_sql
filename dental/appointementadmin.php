<?php
session_start(); 

$use = $_SESSION['userid']; 
?>
<?php
// The link to the database is moved to the top of the PHP code.
require ('connect-mysql.php'); // Connect to the db.

// This query INSERTs a record in the users table.
// Has the form been submitted?

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = trim($_POST['name']);
    $codes = trim($_POST['codes']);
    $dent = trim($_POST['dent']);
    $dates = trim($_POST['dates']);
    $time = trim($_POST['time']);

    $q = "INSERT INTO appointement (userid,username,code,dentist,regdate,regtime,status)
    VALUES ('$use','$name', '$codes','$dent','$dates','$time','ยืนยัน')";
    $result = mysqli_query($dbcon, $q); // Run the query.

    if ($result) { // If it runs
        header("location: admin.php");
        exit();
    } else { // If it did not run
        // Message:
        echo '<h2>System Error</h2>
        <p class="error">ไม่สามารถทำการลงทะเบียนได้เนื่องจากข้อผิดพลาดของระบบ ขอโทษในความไม่สะดวก</p>';
        // Debugging message:
        echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
    } // End of if ($result)

    mysqli_close($dbcon); // Close the database connection.
    // Include the footer and quit the script:
    exit();
} 

// End of the main Submit conditional.
?>
<!doctype html>
<html lang=th>
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
   
    <h2 class="page">สร้างการจอง</h2>
    <form action="appointementadmin.php" method="post" class="form">

    <?php
    // Connect to the database
    $dbcon = mysqli_connect("localhost", "root", "", "dentalclinic");
    $dbcon->set_charset("utf8mb4");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT CONCAT(code,'-',description) AS codes FROM dentalcode";
    $result = mysqli_query($dbcon, $query);
    ?>
     
    <?php
    $query = "SELECT CONCAT(name) AS name FROM signup";
    $result = mysqli_query($dbcon, $query);
    ?>

    <label for="name">ชื่อ:<select name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" >
    <?php
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <option> <?php echo $line['name'];?> </option>
    <?php
    }
    ?>
    </select></label><br><br>

    <?php
    $query = "SELECT CONCAT(code,'-',description) AS codes FROM dentalcode";
    $result = mysqli_query($dbcon, $query);
    ?>
    <label for="codes">รหัส:<select name="codes" value="<?php if (isset($_POST['codes'])) echo $_POST['codes']; ?>" >
    <?php
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <option> <?php echo $line['codes'];?> </option>
    <?php
    }
    ?>
    </select></label><br><br>

    <?php
    $query = "SELECT CONCAT(did,'-',name) AS dent FROM dentist";
    $result = mysqli_query($dbcon, $query);
    ?>

    <label for="dent">ทันตแพทย์:<select name="dent" value="<?php if (isset($_POST['dent'])) echo $_POST['dent']; ?>" >
    <?php
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    ?>
    <option> <?php echo $line['dent'];?> </option>
     
    <?php
    }
    ?>
    </select><br><br>

    <label for="dates">วันที่:</label>   
    <input type="text" id="datepicker" name="dates" value="<?php if (isset($_POST['regdate'])) echo $_POST['regdate']; ?>" ><br><br>
    
   

    <label>เวลา:</label> <select name="time" id="hall" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>" >
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
        <option>7 PM</option>  <!-- time for 24 houre -->
    </select>
    <br>
    <br>

    <input id="submit" type="submit" name="submit" value="ยืนยัน">

    </form>
</body>
</html>
