<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['signup'])) {

    //Code for student ID
    $count_my_page = ("studentid.txt");
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $StudentId = $hits[0];
    $fname = $_POST['fullanme'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = 1;
    $sql = "INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,EmailId,Password,Status) VALUES(:StudentId,:fname,:mobileno,:email,:password,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':StudentId', $StudentId, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo '<script>alert("Your Registration is successful and your student id is ' . $StudentId . '")</script>';
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../library/Transparent Login Form UI/Transparent Login Form UI/style.css">
    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }

        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'emailid=' + $("#emailid").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

</head>

<body>
    <div class="bg-img3">
        <div class="content">
            <header>Sign up</header>
            <form name="signup" method="post" onSubmit="return valid();">
                <div class="field">
                    <span class="fa fa-address-book"></span>
                    <input class="form-control" type="text" name="fullanme" required required placeholder="FULLNAME" autocomplete="off" />
                </div>
                <div class="field space">
                    <span class="fa fa-phone"></span>
                    <input class="form-control" type="text" name="mobileno" maxlength="10" required required placeholder="MOBILE NUMBER" autocomplete="off" />
                </div>
                <div class="field space">
                    <span class="fa fa-user"></span>
                    <input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()" required required placeholder="Email" autocomplete="off" />
                    <span class="field" id="user-availability-status" style="font-size:14px;"></span>
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input class="pass-key" type="password" name="password" required placeholder="Password" required autocomplete="off" />
                    <span class="show">SHOW</span>
                </div>
                <div class="field space">
                    <span class="fa fa-key"></span>
                    <input class="pass-key2" type="txt" name="confirmpassword" required placeholder="Confirm Password" required autocomplete="off" />
                </div>
                <div class="field">
                    <input type="submit" name="signup" id="submit" class="btn btn-success" value="REGISTER">
                </div>
            </form>
            <div class="space">
                <a href="userlogin.php" class="btn btn-danger">LOGIN</a>
                <a href="dashboard.php" class="btn btn-info">HOME</a>
            </div>
        </div>
    </div>

    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script
