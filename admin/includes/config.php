<?php
$servername = "localhost";
$username = "u409066344_salahSysUSER";
$password = "N@b$90949089";
$dbname = "u409066344_salahSysDB";
$dbconnect = new MySQLi($servername,$username,$password,$dbname);
if ( $dbconnect->connect_error ){
die("Connection Failed: " .$dbconnect->connect_error );
}
$sql = "SET CHARACTER SET utf8mb4";
$dbconnect->query($sql);
?>
 