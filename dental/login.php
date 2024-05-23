<!doctype html>
<html lang=th>
<head>
<title>เข้าสู่ระบบ</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"></head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<div class="top"><img src="download.png" width="40" height="40" class="logo">
		<p class="logotext">คลินิกทันตแพทย์วิสาขา</p></div>
<div id="container">

<div id="content"><!-- Start of the login page content. -->

<?php
		// This section processes submissions from the login form
		// Check if the form has been submitted:
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//connect to database
				require ('connect-mysql.php'); 
				// Validate the email address
				if (!empty($_POST['email'])) {
				$e = mysqli_real_escape_string($dbcon, $_POST['email']);
				} else {
				$e = FALSE;
				echo '<p class="error">ลืมใส่อีเมล์ กรุณาลองอีกครั้ง</p>';
				}
				// Validate the password
				if (!empty($_POST['password'])) {
				$p = mysqli_real_escape_string($dbcon, $_POST['password']);
				} else {
				$p = FALSE;
				echo '<p class="error">ลืมใส่รหัสผ่าน กรุณาลองใหม่</p>';
				}


				if ($e && $p)
				{           //if no problems 
							// Retrieve the user_id, first_name and user_level for that email/password combination
							$q = "SELECT userid, user_level FROM signup WHERE (email='$e' AND password='$p')";
							// Run the query and assign it to the variable $result
							$result = @mysqli_query ($dbcon, $q);
							// Count the number of rows that match the email/password combination

                             

							if (@mysqli_num_rows($result) == 1) 
							{       //if one database row (record) matches the input:-
									// Start the session, fetch the record and insert the three values in an array
                                    
                                    
									session_start(); 
									$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
									// Ensure that the user level is an integer.
									$_SESSION['user_level'] = (int) $_SESSION['user_level'];
									$_SESSION['userid'];
									// Use a ternary operation to set the URL 
									
									$url = ($_SESSION['user_level'] === 1) ? 'admin.php' : 'index1.php';
									header('Location: ' . $url); // Make the browser load either the members’ or the admin page
									exit(); // Cancel the rest of the script
									mysqli_free_result($result);
									mysqli_close($dbcon);
							} 

							else { // No match was made.
									echo '<p class="error">ที่อยู่อีเมลและรหัสผ่านที่ป้อนไม่ตรงกับข้อมูลในระบบของเรา
									<br>อาจเป็นเพราะคุณยังไม่ได้ลงทะเบียน กรุณาคลิกปุ่มลงทะเบียนในเมนู</p>';
							       }

				} 
				else { // If there was a problem.
				        echo '<p class="error">โปรดลองอีกครั้ง</p>';
				       }
				mysqli_close($dbcon);
		} // End of SUBMIT conditional.
?>

<!-- Display the form fields--> 
<div id="loginfields">
<?php include ('loginpage.php'); ?>
</div><br>

</div>
</div>
</body>
</html>

