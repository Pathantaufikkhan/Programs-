<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['alogin'] != '') {
  $_SESSION['alogin'] = '';
}
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT UserName,Password FROM admin WHERE UserName=:username and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['alogin'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
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
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
  <!-- ----MENU SECTION START-->

  <!-- MENU SECTION END-->
  <!-- <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ADMIN LOGIN FORM</h4>
                </div>
            </div> -->

  <!--LOGIN PANEL START-->
  <!-- <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            LOGIN FORM
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">

                                <div class="form-group">
                                    <label>Enter Username</label>
                                    <input class="form-control" type="text" name="username" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>

                                <button type="submit" name="login" class="btn btn-danger">LOGIN </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>admin login</title>
    <link rel="stylesheet" href="../library/Transparent Login Form UI/Transparent Login Form UI/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>

  <body>
    <div class="bg-img">
      <div class="content">
        <header> ADMIN LOGIN</header>
        <form role="form" method="post">
          <div class="field">
            <span class="fa fa-user"></span>
            <input class="form-control" type="text" name="username" autocomplete="off" required placeholder="USERNAME" />
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input class="pass-key" type="password" name="password" autocomplete="off" required placeholder="PASSWORD" />
            <span class="show">SHOW</span>
          </div>
          <div class="pass">
         
          </div>
          <div class="field">
            <input type="submit" name="login" value="submit">
            
          </div>
        </form>

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
      </div>
    </div>
  </body>

  </html>


  <!---LOGIN PABNEL END-->


  </div>
  </div>
  <!-- CONTENT-WRAPPER SECTION END-->

  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>
  </script>
</body>

</html>