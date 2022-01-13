<?php
include 'database.php';
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
<?php 
session_start();

if (isset($_SESSION['useremail'])) {

}

?>
<section class="login-section">
        <form method="POST">
            <h2 class="login-title title ">Login page</h2>
            <div class="login-content ">
      
              <div class=" login-email text-field">
      
                <label for="email" class="my-3 style-label">email :</label>
                <input type="text" class="form-control " name="email" placeholder="enter your email">
              </div>
                 
              <div class="login-password text-field">
                <label for="password" class="my-3 style-label"> password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
              </div>
              <p class="login-label mt-2 style-label">forgot your password :<a href="checkemail.php" style="text-decoration: none;"> Click here</a></p>
      
              <button type="submit" class="btn btn-success 
                    button-giris" name="loginbutton">Login</button>
      
            </div>
            <?php
            $password = "";
            $useremail = "";

        if (isset($_POST["email"])) {

          $useremail = $_POST['email'];
        }

        if (isset($_POST["password"])) {

          $password =  $_POST['password'];
        }


        if (isset($_POST["loginbutton"])) {
        
            $sifrelipassword=md5($password);
            $_SESSION['useremail']= $useremail;
            $useremailselect = "select * from users where user_email = '$useremail'";
            $result0 = mysqli_query($con, $useremailselect);
            $num0 = mysqli_num_rows($result0);
            if ($num0 == 1) {
             
              $userselect = "select * from users where user_email = '$useremail' and user_password = '$sifrelipassword' and rol_id=1";
              $adminselect = "select * from users where user_email = '$useremail' and user_password = '$password' and rol_id=2";

              $result1 = mysqli_query($con, $userselect);
              $result2 = mysqli_query($con, $adminselect);
              $num1 = mysqli_num_rows($result1);
              $num2 = mysqli_num_rows($result2);
              if ($num1 == 1 ) {
                $_SESSION['useremail']=$useremail;

               header('Location:ogrenci_exam.php');
           } 
           elseif($num2 == 1 ){
                $_SESSION['adminemail']=$useremail;
                header('Location:students.php'); //Redirect To Dashboard Page
              }
           else {
        ?>      
              <a class="alert alert-danger"> your password wrong</a>
            <?php
            }
          } else {

            ?>
            <div class="alert alert-danger"> your email wrong </div>
        <?php
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