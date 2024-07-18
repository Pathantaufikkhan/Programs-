<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if the user is logged in
if (strlen($_SESSION['login']) == 0) {
    header('location:dashboard.php');
    exit;
} else {
    if (isset($_POST['submitRequest'])) {
        // Get the requester's email from session
        $requester_email = $_SESSION['login'];

        // Get the book id and title from the form
        // $request_id = $_POST['request_id'];

        $bookname = $_POST['bookname'];
        
        // echo "<script>alert('".$request_id."')</script>";

        

        // Validate input data (optional)
        // Example: Check if request_id is numeric

        // Insert borrow request into database
        $sql = "INSERT INTO borrow_requests (requester_email, bookname) VALUES (:requester_email, :bookname)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':requester_email', $requester_email, PDO::PARAM_STR);
        $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
        $query->execute();
       


        
        // Check if the request was successfully inserted
        if($query) {
            
        echo "<script>alert('borrow request sent success')</script>";
        

        } else {
            
        echo "<script>alert('ERROR')</script>";

        }

        exit;

        
    }
    
}

?>
