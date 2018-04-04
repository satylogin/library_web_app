<?php

require "connect.php";

if (isset($_SESSION['id'])) {
	header("LOCATION: loginpage.php");
} else {
	header("LOCATION: displaying_data.php");
}

?>