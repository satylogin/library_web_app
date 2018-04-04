<?php

require "connect.php";

if (!isset($_SESSION['id']) || ($_SESSION['id'] != 'RDR1')) {
	die('sorry. you do not permission to add or remove the books');
}

$book_id = mysqli_real_escape_string($con, $_POST['book_id']);
$book_name = mysqli_real_escape_string($con, $_POST['book_name']);
$publisher = mysqli_real_escape_string($con, $_POST['publisher']);
$author = mysqli_real_escape_string($con, $_POST['author']);
$department = mysqli_real_escape_string($con, $_POST['department']);
$issue_status = "available";
$reserve_status = "available";

$sql = 'INSERT INTO book VALUES("'.$book_id.'", "'.$book_name.'", "'.$publisher.'", "'.$author.'", "'.$department.'", "'.$issue_status.'", "'.$reserve_status.'")';
$qry = mysqli_query($con, $sql);

if (!$qry) {
	die('some error occured, try again later');
}

header("LOCATION: add_books.php");

?>