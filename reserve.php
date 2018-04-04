<?php
require "connect.php";

$book_id = $_GET['book_id'];
$id = $_SESSION['id'];

$sql1 = 'SELECT * FROM log WHERE reader_id = "'.$id.'"';
$sql2 = 'SELECT * FROM reserved WHERE reader_id = "'.$id.'"';
$sql3 = 'SELECT * FROM book WHERE book_id = "'.$book_id.'"';

$qry3 = mysqli_query($con, $sql3);
$row = mysqli_fetch_assoc($qry3);

if ($row['reserve_status'] == 'reserved') {
	die('book already reserved');
}


$qry1 = mysqli_query($con, $sql1);
$qry2 = mysqli_query($con, $sql2);


$cnt1 = mysqli_num_rows($qry1);
$cnt2 = mysqli_num_rows($qry2);

if ($cnt2 > 0 || ($cnt1 + $cnt2) > 2) {
	die("reserve limit reached");
}

$priority = time();

$sql1 = 'UPDATE book SET reserve_status = "reserved" WHERE book_id = "'.$book_id.'"';
$sql2 = 'INSERT INTO reserved VALUES ("'.$book_id.'", "'.$id.'", '.$priority.')';

mysqli_query($con, $sql1);
mysqli_query($con, $sql2);

header("LOCATION: displaying_data.php");

?>