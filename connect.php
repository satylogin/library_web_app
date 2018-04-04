<?php

$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = 'superman1234'; 
$db_name = 'library'; 

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$con) {
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

session_start();

if (!isset($_SESSION['book_table_query'])) {
	$_SESSION['book_table_query'] = "";
}

?>