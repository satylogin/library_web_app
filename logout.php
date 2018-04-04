<?php
	require "connect.php";

	session_destroy();

	header("LOCATION: loginpage.php");
?>