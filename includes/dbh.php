<?php

//$host= "sql302.epizy.com";
//$username= "epiz_30186562";
//$password = "WX6myy2ZDW";

//$db_name = "epiz_30186562_cpsystem";
$host= "localhost";
$username= "root";
$password = "";

$db_name = "cpsystem";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}