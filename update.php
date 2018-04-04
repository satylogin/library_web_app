<?php
	require "connect.php";

	if (!isset($_SESSION['id'])) {
		die('no user logged in');
	}

	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$contact = mysqli_real_escape_string($con, $_POST["contact"]);
	$password = md5(mysqli_real_escape_string($con, $_POST["password"]));
	$opassword = md5(mysqli_real_escape_string($con, $_POST["opassword"]));
	$email = mysqli_real_escape_string($con, $_POST["email"]);

	$sql = 'SELECT * FROM reader WHERE reader_id = "'.$_SESSION['id'].'"';
	$qry = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($qry);
	if ($opassword != $row['password']) {
		die('password mismatch');
	}

	$sql = 'UPDATE reader SET name = "'.$name.'", email_id = "'.$email.'", contact_number = "'.$contact.'", password = "'.$password.'" WHERE reader_id = "'.$_SESSION['id'].'"' ;
	$qry = mysqli_query($con, $sql);

	if (!$qry) {
		die("update error, please try again");
	}

	header('LOCATION: profile.php');
?>