<?php
include('includes/config.php');

if (isset($_POST['email'])) {
  $email = $_POST['email'];

  // Check if email exists in the database
  $sql = "SELECT * FROM tblstudents WHERE EmailId = :email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $count = $query->rowCount();

  if ($count > 0) {
    // Email exists
    echo 'exists';
  } else {
    // Email doesn't exist
    echo 'not_exists';
    
  }
}
?>
