<?php
require "connect.php";

if (!isset($_SESSION["id"])) {
    header("LOCATION: loginpage.php");
}
if ($_SESSION['id'] != 'RDR1') {
    die("you are not allowed to view tis page");
}

$sql = "SELECT * FROM reserved ORDER BY priority";

$qry = mysqli_query($con, $sql);

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

        <h1>BOOKS STATUS: LIST OF RESERVED BOOKS</h1> 
        <table class="data-table">
                <thead>
                        <tr>
                                <th>Book ID</th>
                                <th>READER ID</th>
                                <th>PRIORITY</th>
                                <th>ISSUE/CANCEL</th>
                                <th>VERIFY</th>
                        </tr>
                </thead>
                <tbody>
                <?php
                        while ($row = mysqli_fetch_array($qry)) {
                                echo '<tr>
                                                <form action = "issue.php" method = "GET">
                                                <input type = "text" value = "'.$row['book_id'].'" style = "display:none" name = "book_id">
                                                <input type = "text" value = "'.$row['reader_id'].'" style = "display:none" name = "reader_id">
                                                <td>'.$row['book_id'].'</td>
                                                <td>'.$row['reader_id'].'</td>
                                                <td>'.$row['priority'].'</td>
                                                <td><input type = "text" value = "issue (y/n)" name = "issue"></input></td>
                                                <td><input type = "submit" value = "issue"></td>
                                                </form>
                                        </tr>';
                        }
                ?>
                </tbody>
        </table>
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
