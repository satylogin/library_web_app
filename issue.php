<?php
require "connect.php";

$id = $_GET['reader_id'];
$issue = $_GET['issue'];
$book_id = $_GET['book_id'];

$sql = 'SELECT * FROM log WHERE book_id = "'.$book_id.'"';
$qry = mysqli_query($con, $sql);
if (mysqli_num_rows($qry) > 0) {
	die('bool already issued');
}

if ($issue == 'y') {
	$sql1 = 'UPDATE book SET reserve_status = "available", issue_status = "issued" WHERE book_id = "'.$book_id.'"';
	$sql2 = 'DELETE FROM reserved WHERE book_id = "'.$book_id.'"';
	$sql3 = 'INSERT INTO log VALUES ("'.$book_id.'", "'.$id.'")';

	echo $sql1;

	$qry1 = mysqli_query($con, $sql1);
	$qry2 = mysqli_query($con, $sql2);
	$qry3 = mysqli_query($con, $sql3);

} else if ($issue == 'n') {
	$sql1 = 'UPDATE book SET reserve_status = "available" WHERE book_id = "'.$book_id.'"';
	$sql2 = 'DELETE FROM reserved WHERE book_id = "'.$book_id.'"';
	
	$qry1 = mysqli_query($con, $sql1);
	$qry2 = mysqli_query($con, $sql2);

	header("LOCATION: reserved_books.php");

} else {
	die('choose a valid option');
}

header("LOCATION: reserved_books.php");

?>