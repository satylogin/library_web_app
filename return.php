<?php
require "connect.php";

$book_id = $_GET['book_id'];
$reader_id = $_SESSION['reader_id'];

$sql1 = 'DELETE FROM log WHERE book_id = "'.$book_id.'"';
$sql2 = 'UPDATE book SET issue_status = "available" WHERE book_id = "'.$book_id.'"';

$qry1 = mysqli_query($con, $sql1);
$qry2 = mysqli_query($con, $sql2);

header("LOCATION: log.php");

?>