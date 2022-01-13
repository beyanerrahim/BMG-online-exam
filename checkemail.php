<?php
include 'database.php';
include 'sendEmail.php';
session_start();
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
    <title>check email sayfasi</title>
   
</head>
<body class="bodylogin">
    
<section class="login-section">
        <form method="post">
            <h2 class=" title ">check email page</h2>
            <div class="login-content ">
      
              <div class=" login-email text-field">
      
                <label for="email" class="my-3 style-label">email :</label>
                <input type="text" class="form-control " name="email" placeholder="enter your email">
              </div>
                       
              <button type="submit" class="btn btn-success 
                    mt-3" id="sendEmail1"  name="sendEmail">check</button>
      
            </div>
            <?php



if (isset($_POST['sendEmail'])) {
    $email = $_POST['email'];
    $_SESSION['useremail']=$email;

    $emailCheckQuery = "Select * from users where user_email = '$email'";
    $emailCheckResult = mysqli_query($con, $emailCheckQuery);
    while($res= mysqli_fetch_array($emailCheckResult)){
        $username =$res["user_name"];
    }
    if ($emailCheckResult) {
        if (mysqli_num_rows($emailCheckResult) > 0) {
            $code = rand(999999, 111111);
            $updateQuery = "UPDATE users SET code = $code where user_email = '$email'";
            $updateResult = mysqli_query($con, $updateQuery);
            if ($updateResult) {
                $subject = 'لأعادة انشاء كلمة السر';
                $message = "من اجل اعادة كلمة المرور استخدم هذا الكود $code";

                if (send_mail1($email,$username,$subject,$message)) {
               


                    header('location: code.php');
                }else{
                    ?>
                    <div class="alert alert-danger">kod gondirilemedi  </div>
                    <?php 
                }
            } else {
                ?>
                   <div class="alert alert-danger">kod gondirilemedi</div>

                <?php 
               
            }
        } else {
            ?>
                 <div class="alert alert-danger"> the email is wrong </div>

            <?php 
         }
    } else {
        ?>
                <div class="alert alert-danger"> email dogrulamasi basarisiz oldu </div>
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