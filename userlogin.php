<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}
if (isset($_POST['login'])) {

    $email = $_POST['emailid'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
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
                echo "<script>alert('log in successfully');</script>";
                echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            } else {
                echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../library/Transparent Login Form UI/Transparent Login Form UI/style.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="bg-img2">
      <div class="content">
        <header>Login Form</header>
        <form role="form" method="post">
          <div class="field">
            <span class="fa fa-user"></span>
            <input class="form-control" type="text" name="emailid" required required placeholder="Email" autocomplete="off" />
          </div>
          <div class="field space">
          <span class="fa fa-lock"></span>
            <input class="pass-key" type="password" name="password" required placeholder="Password" required autocomplete="off" />
            <span class="show">SHOW</span>
          </div>
          <div class="pass">
            <a href="user-forgot-password.php">Forgot Password?</a>
          </div>
          
          <div class="field">
            <input type="submit" name="login" class="btn btn-info" value="LOGIN">
            
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
        <div class="signup">Don't have account?
          <a href="signup.php">Signup Now</a><br>
          <a href="dashboard.php"> HOME </a>
        </div>
         
    </div>

       </div>
    <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>


  </body>
</html>
