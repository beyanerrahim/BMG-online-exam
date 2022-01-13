<?php
include 'database.php';
session_start();
if (isset($_SESSION['useremail'])) {
   // echo $_SESSION['useremail'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>code sayfa</title>
   
</head>
<body class="bodylogin">
    
<section class="login-section">
        <form method="post">
            <h2 class="login-title title ">reset your password</h2>
            <div class="login-content ">
      
              <div class=" login-email text-field">
      
                <label for="email" class="my-3 style-label">new password :</label>
                <input type="password" class="form-control " name="password" placeholder="enter new password">
              </div>
                 
              <div class="login-password text-field">
                <label for="password" class="my-3 style-label"> repeat new password:</label>
                <input type="password" class="form-control" name="confirmpassword" placeholder="Enter repeat your password">
              </div>      
              <button type="submit" class="btn btn-success 
                    mt-3" name="changePassword" id="changePassword">Reset </button>
      
            </div>
            <?php
        if (isset($_POST['changePassword'])) {

            $password =md5($_POST['password']);
            $confirimpassword =md5($_POST['confirmpassword']);
            $email = $_SESSION['useremail'];

            $emailCheckQuery = "SELECT * FROM users WHERE user_email = '$email'";
            $emailCheckResult = mysqli_query($con, $emailCheckQuery);

            if ($emailCheckQuery) {
                if (mysqli_num_rows($emailCheckResult) < 0) {
                } else {
                    if (strlen(trim($_POST['password'])) < 6) {
        ?>
                        <div class="alert">altidan fazla harf veya rakam kullanin</div>

                        <?php
                    } else {
                        if ($password != $confirimpassword) {
                        ?>
                            <div class="alert alert-danger">iki kod eslesmiyor</div>

        <?php                        } else {
                            $confirimpassword = $password;

                            $updatePassword = "UPDATE users SET user_password = '$password' where user_email = '$email '";
                            mysqli_query($con, $updatePassword);
                            session_unset();
                            session_destroy();
                            header("location: login.php");
                        }
                    }
                }
            }
        }
        ?>
          </form>

 </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>