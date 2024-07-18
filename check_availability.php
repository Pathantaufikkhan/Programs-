<?php 
require_once("includes/config.php");

if(!empty($_POST["emailid"])) {
    $email = $_POST["emailid"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "<script>alert('Error: You did not enter a valid email.');</script>";
    } else {
        $sql = "SELECT EmailId FROM tblstudents WHERE EmailId = :email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();

        if ($count > 0) {
            echo "<script>alert('Email already exists.');</script>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        } else {
            echo "<script>alert('Email available for Registration.');</script>";
            echo "<script>$('#submit').prop('disabled', false);</script>";
        }
    }
}
?>
