<!doctype html>
<html lang="th">
<head>
    <title>เเก้ไขข้อมูลยา</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="dentist.css">
</head>
<body>
<div id="container">
    <div id="content"><!--Start of the edit page content-->
        <h2 style="margin-left: 45%;">แก้ไขข้อมูลยา</h2>

        <?php
        // After clicking the Edit link in the found_record.php page, the editing interface appears
        // The code looks for a valid user ID, either through GET or POST #1
        if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
            $id = $_GET['id'];
        } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission
            $id = $_POST['id'];
        } else { // If no valid ID, stop the script
            echo '<p class="error">เกิดข้อผิดพลาด</p>';
            exit();
        }

        require('connect-mysql.php');

        // Has the form been submitted?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = array();

            if (empty($_POST['code'])) {
                $errors[] = 'กรุณาใส่รหัสยาอีกครั้ง';
            } else {
                $code = mysqli_real_escape_string($dbcon, trim($_POST['code']));
            }

            if (empty($_POST['name'])) {
                $errors[] = 'กรุณากรอกชื่อยาอีกครั้ง';
            } else {
                $name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
            }

            if (empty($_POST['unit'])) {
                $errors[] = 'กรุณากรอกจำนวนอีกครั้ง';
            } else {
                $unit = mysqli_real_escape_string($dbcon, trim($_POST['unit']));
            }

            if (empty($_POST['mtype'])) {
                $errors[] = 'กรุณากรอกประเภทอีกครั้ง';
            } else {
                $mtype = mysqli_real_escape_string($dbcon, trim($_POST['mtype']));
            }

            if (empty($errors)) { // If everything is OK, make the update query
                $q = "UPDATE adminmed SET medcode='$code', medname='$name', unit='$unit', medtype='$mtype' WHERE medcode='$id' LIMIT 1";
                $result = @mysqli_query($dbcon, $q);
                if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
                    // Echo a message if the edit was satisfactory
                    echo '<center><h3>เเก้ไขเรียบร้อย</h3></center>';
                } else { // Echo a message if the query failed
                    echo '<p class="error">เกิดข้อผิดพลาดของระบบ ทำให้ไม่สามารถแก้ไขได้ ขออภัยในความไม่สะดวก</p>'; // Error message.
                    echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>'; // Debugging message.
                } // End of if ($result)
                mysqli_close($dbcon); // Close the database connection.
                // Include the footer and quit the script:
                exit();
            } else { // Display the errors.
                echo '<p class="error">The following error(s) occurred:<br />';
                foreach ($errors as $msg) { // Extract the errors from the array and echo them
                    echo " - $msg<br>\n";
                }
                echo '</p><p>กรุณาลองใหม่อีกครั้ง</p>';
            } // End of if (empty($errors)) section
        } // End of the conditionals

        // Select the record
        $q = "SELECT medcode, medname, unit, medtype FROM adminmed WHERE medcode='$id'";
        $result = @mysqli_query($dbcon, $q);
        if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
            // Get the user's information
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            // Create the form
            echo '<form action="edit_med.php" method="post" style="margin-left: 25%;">
            <p><label class="label" for="code">รหัสยา:</label>
            <input class="fl-left" id="code" type="text" name="code" size="30" maxlength="30" value="' . $row[0] . '"></p>

            <p><label class="label" for="name">ชื่อยา:</label>
            <input class="fl-left" id="name" type="text" name="name" size="30" maxlength="50" value="' . $row[1] . '"></p>

            <p><label class="label" for="unit">จำนวน:</label>
            <input class="fl-left" id="unit" type="text" name="unit" size="30" maxlength="50" value="' . $row[2] . '"></p>

            <p><label class="label" for="mtype">ประเภทยา:</label>
            <select id="mtype" name="mtype">
                <option value="ยาน้ำ"' . ($row[3] == 'ยาน้ำ' ? ' selected="selected"' : '') . '>ยาน้ำ</option>
                <option value="ยาทา"' . ($row[3] == 'ยาทา' ? ' selected="selected"' : '') . '>ยาทา</option>
                <option value="ยารับประทาน"' . ($row[3] == 'ยารับประทาน' ? ' selected="selected"' : '') . '>ยารับประทาน</option>
            </select></p>

            <p><input id="submit" type="submit" name="submit" value="เเก้ไข"></p>
            <input type="hidden" name="id" value="' . $id . '" />
            </form>';
        } else { // The record could not be validated
            echo '<p class="error">เกิดข้อผิดพลาด</p>';
        }
        mysqli_close($dbcon);
        ?>
    </div>
</div>
</body>
</html>
