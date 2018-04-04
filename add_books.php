<?php

require "connect.php";
if (!isset($_SESSION['id']) || ($_SESSION['id'] != 'RDR1')) {
	die('sorry. you do not permission to add or remove the books');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DASHBOARD</title>
    <!-- Bootstrap core CSS-->
    <link href="dashboard/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="dashboard/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="table.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php 
  	require "nav.php";
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
     
        <!-- displaying data -->

        <form class="form-horizontal" action="add.php" method = "POST">
			<div class="form-group">
				<label class="control-label col-sm-2" for="book_id">BOOK ID:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="book_id" name="book_id">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="book_name">BOOK NAME:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="book_name" name="book_name">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="publisher">PUBLISHER:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="publisher" name="publisher">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="author">AUTHOR:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="author" name="author">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="department">DEPARTMENT:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="department" name="department">
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
        
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <!-- Bootstrap core JavaScript-->
    <script src="dashboard/jquery/jquery.min.js"></script>
    <script src="dashboard/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="dashboard/jquery-easing/jquery.easing.min.js"></script>
  </div>
</body>

</html>
