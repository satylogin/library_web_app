<?php

require "connect.php";

if (!isset($_SESSION["id"])) {
    header("LOCATION: loginpage.php");
}

$sql = 'SELECT * FROM reader WHERE reader_id = "'.$_SESSION['id'].'"';
//echo $sql;

$qry = mysqli_query($con, $sql);
$row = mysqli_fetch_array($qry);

$reader_id = $row['reader_id'];
$reader_name = $row['name'];
$reader_email = $row['email_id'];
$reader_contact = $row['contact_number'];
$reader_password = $row['password'];

$sql1 = 'SELECT * FROM log WHERE reader_id = "'.$reader_id.'"';
$sql2 = 'SELECT * FROM reserved WHERE reader_id = "'.$reader_id.'"';

$qry1 = mysqli_query($con, $sql1);
$qry2 = mysqli_query($con, $sql2);

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
                <label class="control-label col-sm-6"><b>READER ID: </b><?php echo $reader_id; ?></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6"><b>NAME: </b><?php echo $reader_name; ?></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6"><b>EMAIL: </b><?php echo $reader_email; ?></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6"><b>CONTACT: </b><?php echo $reader_contact; ?></label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6"><b>ISSUED BOOKS: </b>
                    <?php
                        $ans = "";
                        while ($row = mysqli_fetch_assoc($qry1)) {
                            $ans = $ans.''.$row['book_id'].' ';
                        }
                        echo $ans;
                    ?>
                </label>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-6"><b>RESERVED BOOKS: </b>
                    <?php
                        $ans = "";
                        while ($row = mysqli_fetch_assoc($qry2)) {
                            $ans = $ans.''.$row['book_id'].' ';
                        }
                        echo $ans;
                    ?>
                </label>
            </div>
        </form>


        <hr>
        <div class="form-group">
                <label class="control-label col-sm-6"><b>UPDATE PROFILE</b></label>
        </div>
        <form class="form-horizontal" action="update.php" method = "POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">NAME:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value = "<?php echo $reader_name ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">EMAIL:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value = "<?php echo $reader_email ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contact">CONTACT:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contact" name="contact" value = "<?php echo $reader_contact ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="opassword">OLD PASSWORD:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="opassword" name="opassword" value = "">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">NEW PASSWORD:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value = "<?php echo $reader_password ?>">
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
