<?php
require "connect.php";

$_SESSION['book_table_query'] = 'SELECT * FROM book WHERE (UPPER(book_name) LIKE UPPER("%'.mysqli_real_escape_string($con, $_GET['book_name']).'%")) 
	OR (UPPER(publisher) LIKE UPPER("%'.mysqli_real_escape_string($con, $_GET['book_name']).'%")) 
		OR (UPPER(author) LIKE UPPER("%'.mysqli_real_escape_string($con, $_GET['book_name']).'%"))
			OR (UPPER(department) LIKE UPPER("%'.mysqli_real_escape_string($con, $_GET['book_name']).'%"))';

header('LOCATION: displaying_data.php');

?>