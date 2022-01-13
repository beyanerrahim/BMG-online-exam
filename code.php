<?php
include 'database.php';
?>
<?php 
session_start();

if (isset($_SESSION['useremail'])) {
    $email= $_SESSION['useremail'];
   // <?php echo $email; 
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
    <title>login sayfa</title>
    
</head>
<body class="bodylogin">
    
<section class="login-section">
        <form method="post">
            <h2 class=" title ">code page</h2>
            <div class="login-content ">
      
              <div class=" login-email text-field">
      
                <label for="email" class="my-3 style-label">the code :</label>
                <input type="text" class="form-control " name="OTPverify" placeholder="enter the code" required>
              </div>
                       
              <button type="submit" class="btn btn-success 
                    mt-3" name="verifyEmail">check</button>
      
            </div>
            <?php
                     
            if(isset($_POST['verifyEmail'])){
                $OTPverify = mysqli_real_escape_string($con,$_POST['OTPverify']);
                $verifQuery ="SELECT * from users where code = $OTPverify";
                $runVerifyQuery = mysqli_query($con, $verifQuery);
                if($runVerifyQuery){
                   if(mysqli_num_rows($runVerifyQuery) > 0){
                       $newQuery = "UPDATE users SET code = 0";
                       mysqli_query($con,$newQuery);
                       header('location: resetpassword.php');
                   }else{
                    ?>
                    <div class="alert alert-danger"> code not correct</div>

                <?php
                   }
               
                }else{
                    ?>
                    <div class="alert alert-danger"> code not correct </div>
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