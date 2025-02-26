<?php
session_start();
error_reporting(0);
include('includes/config.php');
include "borrow.php";



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Issued Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line"> Book</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Issued Books
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php
                                    $sql = "SELECT tblbooks.BookName, tblcategory.CategoryName, tblauthors.AuthorName, tblbooks.ISBNNumber, tblbooks.id as bookid, tblbooks.bookImage, tblbooks.isIssued, tblbooks.Description, tblbooks.BookPrice
                        FROM tblbooks 
                        JOIN tblcategory ON tblcategory.id = tblbooks.CatId 
                        JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId";

                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query) {
                                        foreach ($results as $result) { ?>
                                            <div class="col-md-4">
                                                <div class="book-container">
                                                    <div class="book-details">
                                                        <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>" class="book-image">
                                                        <div class="book-info">
                                                            <strong><?php echo htmlentities($result->BookName); ?></strong><br>
                                                            <span><?php echo htmlentities($result->CategoryName); ?></span><br>
                                                            <span><?php echo htmlentities($result->AuthorName); ?></span><br>
                                                            <span>ISBN: <?php echo htmlentities($result->ISBNNumber); ?></span><br>
                                                            <span>Price: <?php echo htmlentities($result->BookPrice); ?></span><br>
                                                        </div>
                                                        <?php if ($result->isIssued == '1') : ?>
                                                            <p class="book-issued">Book Already issued</p>
                                                        <?php else : ?>
                                                            <form method="post" action="listed-books.php" class="borrow-form">
                                                                <input type="hidden" id="bookname" name="bookname" value="<?php echo $result->BookName; ?>" />
                                                                <button type="submit" name="submitRequest" class="btn btn-primary btn-sm">Borrow Request</button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php $cnt = $cnt + 1;
                                        }
                                    } else {
                                        echo "<script>alert('ERROR')</script>";
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>


                </div>
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <?php include('includes/footer.php'); ?>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
</body>

</html>
<?php  ?>