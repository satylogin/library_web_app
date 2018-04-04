<?php
require "connect.php";

if (!isset($_SESSION["id"])) {
    header("LOCATION: loginpage.php");
}

$sql = $_SESSION['book_table_query'];
if ($sql == "") {
        $sql = "SELECT * FROM book";
}
// echo $sql;

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

        <div>
            <form action = "search_book.php" method = "GET" style = "padding:5px;">
                <div class="group" style = "text-align:right; margin-top:10px; margin-right: 20px;">
                    <input id="book_name" type="text" name="book_name" class="input">
                    <input type="submit" class="button" name = "search_book" value="search book">
                </div>
            </form>
        </div>

        <h1>BOOKS STATUS: LIST OF ALL BOOKS</h1> 
        <table class="data-table">
                <thead>
                        <tr>
                                <th>Book ID</th>
                                <th>BOOK NAME</th>
                                <th>PUBLISHER</th>
                                <th>BOOK AUTHOR</th>
                                <th>DEPARTMENT</th>
                                <th>ISSUE STATUS</th>
                                <th>RESERVED STATUS</th>
                                <th>REQUEST ISSUE</th>
                        </tr>
                </thead>
                <tbody>
                <?php
                        while ($row = mysqli_fetch_array($qry)) {
                                echo '<tr>
                                                <form action = "reserve.php" method = "GET">
                                                <input type = "text" value = "'.$row['book_id'].'" style = "display:none" name = "book_id">
                                                <td>'.$row['book_id'].'</td>
                                                <td>'.$row['book_name'].'</td>
                                                <td>'.$row['publisher'].'</td>
                                                <td>'.$row['author'].'</td>
                                                <td>'.$row['department'].'</td>
                                                <td>'.$row['issue_status'].'</td>
                                                <td>'.$row['reserve_status'].'</td>
                                                <td><input type = "submit" value = "reserve"></td>
                                                </form>
                                        </tr>';
                        }

                        $_SESSION['book_table_query'] = "";
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
