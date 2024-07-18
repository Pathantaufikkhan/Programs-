<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if user is logged in
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if request details are provided
    if (isset($_POST['request']) && !empty($_POST['request'])) {
        // Assuming request details are posted via form, handle it here
        $request = $_POST['request'];
        
        // Also, you can include further logic here such as updating the database to store the request
        // Example:
        $query = "INSERT INTO tblrequests (user_id, request) VALUES (:user_id, :request)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':request', $request);
        $stmt->execute();
        
        // Redirect to a page indicating success or any other page as needed
        header('location:request-success.php');
        exit();
    } else {
        // Handle error if request details are not provided
        $error = "Please provide your request details.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Request</title>
</head>
<body>
    <!-- Your HTML form for making a request -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="request">Your Request:</label><br>
        <textarea id="request" name="request" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <!-- Display any error messages here -->
    <?php if (isset($error)) { echo $error; } ?>
</body>
</html>
