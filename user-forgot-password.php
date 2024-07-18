<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['change'])) {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "SELECT EmailId FROM tblstudents WHERE EmailId=:email and MobileNumber=:mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update tblstudents set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>alert('Your Password succesfully changed');</script>";
  } else {
    echo "<script>alert('Email id or Mobile no is invalid');</script>";
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
  <title>Online Library Management System | Password Recovery </title>
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="../library/Transparent Login Form UI/Transparent Login Form UI/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <script type="text/javascript">
    < link rel = "stylesheet"
    href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity = "sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin = "anonymous"
    referrerpolicy = "no-referrer" / >

      function valid() {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
          alert("New Password and Confirm Password Field do not match  !!");
          document.chngpwd.confirmpassword.focus();
          return false;
        }
        return true;
      }
  </script>

</head>

<body>
  <div class="bg-img4">
    <div class="content">
      <header>USER PASSWORD RECOVERY</header>
      <form role="form" name="chngpwd" method="post" onSubmit="return valid();">


        <div class="field space">
          <span class="fa fa-user"></span>
          <input class="form-control" type="email" name="email"   required required placeholder="REGISTERED EMAIL" autocomplete="off" />
          
        </div>
        <div class="field space">
          <span class="fa fa-phone"></span>
          <input class="form-control" type="text" name="mobile" maxlength="10" required required placeholder=" REGISTERED MOBILE NUMBER" autocomplete="off" />
        </div>

        <div class="field space">
          <span class="fa fa-lock"></span>
          <input class="pass-key" type="password" name="newpassword" required placeholder="NEW PASSWORD" required autocomplete="off" />
          <span class="show">SHOW</span>
        </div>
        <div class="field space">
          <span class="fa fa-key"></span>
          <input class="pass-key2" type="txt" name="confirmpassword" required placeholder="confirm Password" required autocomplete="off" />
          <!-- <span class="show">SHOW</span> -->
        </div>
        <div class="pass">
          <!-- <a href="user-forgot-password.php">Forgot Password?</a> -->
        </div>
        <div class="field">
          <input type="submit" name="change"  class="btn btn-suceess" value="CHANGE">
        </div>
      </form>
      <!-- <div class="login">Or login with</div> -->
      <div class="links">
        <!-- <div class="facebook">
            <i class="fab fa-facebook-f"><span>Facebook</span></i>
          </div>
          <div class="instagram">
            <i class="fab fa-instagram"><span>Instagram</span></i>
          </div> -->
      </div>
      <!-- <div class="signup">Don't have account? -->
      <div class="space">
        <a href="userlogin.php"> <input type="submit" name="submit" class="btn btn-danger" value="LOGIN"></a>       <a href="dashboard.php"> <input type="submit" name="submit" class="btn btn-info" value="HOME"></a>
      </div>
      <div class="space">
 
      </div>
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

  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

</body>

</html>