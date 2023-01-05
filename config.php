<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "kwezy";


$conn = mysqli_connect($serverName,$userName,$password,$dbname);

if ($conn) {
	//echo " connected";
}else{
	//echo "error";
}

?>