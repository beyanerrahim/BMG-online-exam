
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php

session_start();
include 'database.php';
if (isset($_SESSION['useremail'])) {
  $useremail=$_SESSION['useremail'];

}

?>
 <!-- Header -->
 <nav class=" navbar navbar-expand-lg navbar-light bg-white">

<div class="container dashdord-nav">
        
   <h2>Online Exam System</h2>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse navdas" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item  mar">
         <a class="nav-link  link" href="ogrenci_exam.php">My Exams <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item mar">
         <a class="nav-link active  link" href="ogrenci_grades.php">My grades </a>
       </li>
       <li class="nav-item mar">
         <a class="nav-link link" href="exit.php">Exit </a>
       </li>

     </ul>
</div>
</div>
 </nav>
 <?php

$query=mysqli_query($con,"SELECT * FROM users where user_email='$useremail'");
  while($rows = mysqli_fetch_array($query)){
    $userid=$rows['users_id'];
    $email1=$rows['user_email'];
 }

?>
 <section>
           <div class="container">
            <h4>all my results</h4>
            <form method="POST">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Exam name</th>
                    <th scope="col">right </th>
                    <th scope="col">wrong</th>
                    <th scope="col">final result</th>
                  </tr>
                </thead>
                <tbody>
                <?php

            $selectquery = "select * from result  where user_id =".$userid;
            //echo $userid;
            $query = mysqli_query($con,$selectquery);
            while($res = mysqli_fetch_array($query)){
                
              $selectname = "select * from exams where exam_id =".$res['exam_id'];;
              $query2 = mysqli_query($con,$selectname);
              while($res1 = mysqli_fetch_array($query2)){



            ?>
      <tr>   
                <td name =""><?php echo $res1['exam_name'];?></td>
                <td name =""><?php echo $res['right_number']; ?></td>
                <td name =""><?php echo $res['wrong_number']; ?></td>
                <td name =""><?php echo $res['final_result']; ?></td>
               
              </tr>
              <?php
              
            }}
              ?>
                </tbody>
              </table>
           </form>
           </div>
     </section>
     <!-- <div class="container">
       <h3 style="color: green;"> Sinif ortalamalari  :</h3> -->
<?php
// $deletequery = "delete from ortalama limit 3";
// mysqli_query($con,$deletequery);

  // $ortquery = "select exam_id,ortalama from ortalama ";
  // $query = mysqli_query($con,$ortquery);
  // while($res = mysqli_fetch_array($query)){
  //   $select = "select * from exams where exam_id =".$res['exam_id'];
  //   $query2 = mysqli_query($con,$select);
  //   while($res1 = mysqli_fetch_array($query2)){
  //       echo $res1['exam_name'] ."  :  ";
  //       echo $res['ortalama'];
  //       echo "<br>";
  // }
  // }
?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>