<?php

DEFINE ('DB_USER','root');
DEFINE ('DB_PSWD','');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','dentalclinic');


$dbcon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);
$dbcon->set_charset("utf8mb4");
if(!$dbcon){
	die('error connecting to database');
}

echo '';

?>