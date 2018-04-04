<?php
	require "connect.php";

	if (isset($_SESSION['id'])) {
		header('LOCATION: displaying_data.php');
	}

	$emailid = mysqli_real_escape_string($con, $_POST["id"]);
	$password = md5(mysqli_real_escape_string($con, $_POST["password"]));

	$sql = 'SELECT * FROM reader WHERE email_id = "'.$emailid.'" AND password = "'.$password.'";';
	$qry = mysqli_query($con, $sql);

	if (!$qry) {
		die("login error, please try again");
	}

	if (mysqli_num_rows($qry) == 0) {
		die("user not found");
	}

	$row = mysqli_fetch_assoc($qry);

	$_SESSION['id'] = $row['reader_id'];
	$_SESSION['name'] = $row['name'];

	echo $_SESSION['id'];

	header('LOCATION: displaying_data.php');
?>