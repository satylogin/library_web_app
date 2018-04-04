<?php
	require "connect.php";

	if (isset($_SESSION['id'])) {
		header('LOCATION: displaying_data.php');
	}

	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$contact = mysqli_real_escape_string($con, $_POST["contact"]);
	$password = md5(mysqli_real_escape_string($con, $_POST["register_password"]));
	$email = mysqli_real_escape_string($con, $_POST["email"]);

	$sql = 'SELECT * FROM reader WHERE email_id = "'.$email.'"';
	$qry = mysqli_query($con, $sql);

	if (mysqli_num_rows($qry) > 0) {
		die("user already registerd: proceed to login");
	}

	$sql = 'SELECT DISTINCT * FROM reader';
	$qry = mysqli_query($con, $sql);
	$next_idx = mysqli_num_rows($qry);
	$next_idx = $next_idx + 1;
	$id = 'RDR'.$next_idx;

	$sql = 'INSERT INTO reader VALUES ("'.$id.'", "'.$name.'", "'.$email.'", '.$contact.', "'.$password.'")';
	echo $sql.'<br>';
	$qry = mysqli_query($con, $sql);

	if (!$qry) {
		die("register error, please try again");
	}

	echo "User registerd: redirecting to login";

	header('LOCATION: loginpage.php');
?>