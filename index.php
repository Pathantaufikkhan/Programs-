<?php
session_start();
error_reporting(0); // Enable error reporting

include('includes/config.php');

// Initialize login session
if (empty($_SESSION['login'])) {
    $_SESSION['login'] = '';
}

if (isset($_POST['login'])) {
    $email = $_POST['emailid'];
    $password = md5($_POST['password']); // Avoid using md5, consider using password_hash

    $sql = "SELECT EmailId, Password, StudentId, Status FROM tblstudents WHERE EmailId = :email AND Password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['stdid'] = $result->StudentId;
            if ($result->Status == 1) {
                $_SESSION['login'] = $_POST['emailid'];
                echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            } else {
                echo "<script>alert('Your Account Has been blocked. Please contact admin');</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System</title>
    <!-- BOOTSTRAP CORE STYLE -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    
    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <!-- HEADER SECTION START -->
    <?php include('includes/header.php'); ?>
    <!-- HEADER SECTION END -->

    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                All Books
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                    $sql = "SELECT tblbooks.BookName, tblcategory.CategoryName, tblauthors.AuthorName, tblbooks.ISBNNumber, tblbooks.id as bookid, tblbooks.bookImage, tblbooks.isIssued, tblbooks.Description 
FROM tblbooks 
JOIN tblcategory ON tblcategory.id = tblbooks.CatId 
JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {
                    ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>" class="card-img-top" alt="Book Image">
                                    <div class="card-body">
                                        <?php if ($result->isIssued == '1') : ?>
                                            <p class="card-text text-danger">Book Already Issued</p>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookModal<?php echo $result->bookid; ?>">View Details</button><br><br>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="bookModal<?php echo $result->bookid; ?>" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel<?php echo $result->bookid; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bookModalLabel<?php echo $result->bookid; ?>"><?php echo htmlentities($result->BookName); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>" class="img-fluid mb-3" alt="Book Image">
                                            <p>Author: <?php echo htmlentities($result->AuthorName); ?></p>
                                            <p>Category: <?php echo htmlentities($result->CategoryName); ?></p>
                                            <p>ISBN: <?php echo htmlentities($result->ISBNNumber); ?></p>
                                            <p>Description: <?php echo htmlentities($result->Description); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<p>No books found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- End Advanced Tables -->
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    
</body>

</html>
