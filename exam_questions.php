<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>sinav</title>
  <?php
  error_reporting(false);

  session_start();
  if (isset($_SESSION['useremail'])) {
    $useremail = $_SESSION['useremail'];
    //  echo $useremail;
  }
  $exam_id = isset($_GET['exam_id']) && is_numeric($_GET['exam_id']) ? intval($_GET['exam_id']) : 0;

  ?>
  <style>
   
      body {
      font-family: "tajawal", sans-serif;
      
    }
    .title {
      width: 100%;
      padding: 9px;
      color: green;
      display: inline-block;
      
    }
    .link2 {
      display: inline-block;
      width: 40%;
      text-align: left;
    }

    .hover-title {
      color: green;
    }

    .hover-title:hover {
      color: darkmagenta;
    }
    .content-question {
      margin: 10px 7%;
    }
.aaa{
    list-style: none;
    text-decoration: none;
    color: green;
}
    /* .button-gonder1{ margin: 0 7%;} */
  </style>
</head>

<body>

<section> 
<!-- <a href="ogrenci_exam.php" class="container ml-5 mt-2 aaa" >ana sayfa</a> -->
    <h3 class="title text-center mb-2 mt-2">Sınav soruları</h3>
    
   
</section>

  <?php
  include 'database.php';

  $quereselectexamname = mysqli_query($con, "SELECT * FROM exams where exam_id =$exam_id");
  while ($res = mysqli_fetch_row($quereselectexamname)) {
    $examname = $res[1];
  }
  global $buton;
  ?>
  
  <?php
  
  if (isset($_POST['gonder'])) {
    $selectquery = "SELECT * FROM users WHERE user_email ='$useremail'";
    $que = mysqli_query($con, $selectquery);

    if ($res = mysqli_fetch_array($que)) {
      $useid = $res[0];
    }
    $examname=mysqli_query($con,"SELECT * FROM result where user_id='$useid' And exam_id='$exam_id'");
    $nums= mysqli_num_rows($examname);
    if($nums == 1){
     
      ?>
      
     <h5 class="alert alert-danger text-center" >Tekrar sinava girmenize izin verilmiyor <a href="ogrenci_grades.php" >grades bolumu</a>!!!!</h5>
      <?php
      //header("location: ogrenci_exam.php");
    }else{
      
  ?>
  
    <h5 class="alert alert-success text-center" style="margin-top: 10px;">grades bolumune girerek puanlarinizi gorebilirsiniz : <a href="ogrenci_grades.php" >grades bolumu</a></h5>


  <?php

  }} 
  if(isset($_POST['gonder'])){
  ?>
  

  <?php
  }
  error_reporting(false);
  $exam = @mysqli_query($con, "SELECT question, question_id FROM questions WHERE exam_id=$exam_id");
  if (@mysqli_num_rows($exam) == 0)
    echo "Errro: No lesson founded";
  else {
    $final = 0;

    $i = 1;
    $dogru=0;
    $yanlis=0;
    while ($exams = @mysqli_fetch_array($exam)) {

      $ques = $exams['question'];
      $quesid = $exams['question_id'];
     

  ?>
      <form method="POST">
        <div class="question container">
          <h3 class="question_title  mb-3"><?php echo $i . ". " . $ques; ?></h3>

          <?php
           
          $anser = @mysqli_query($con, "SELECT answer_A, answer_B, answer_C,true_answer,question_score FROM questions WHERE question_id = $quesid ");
          while ($ans = @mysqli_fetch_array($anser)) {

            $ansera = $ans['answer_A'];
            $anserb = $ans['answer_B'];
            $anserc = $ans['answer_C'];
            $ansertrue = $ans['true_answer'];
            $questionscore = $ans['question_score'];
          ?>
            <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="A">
              <?php echo "&ensp;" . $ansera; ?>
            </div>
            <br> <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="B">
              <?php echo "&ensp;" . $anserb; ?>
            </div>
            <br> <div class="form-check form-check-inline" type="">
              <input type="radio" name=<?php echo $i ?> value="C">
              <?php echo "&ensp;" . $anserc; ?>
            </div>
            <?php
           
            $studentanswer = $_POST["$i"];
            //echo $studentanswer;
            if (isset($_POST['gonder'])) {
              if ($studentanswer == $ansertrue) {
                $r = "  correct answer";
                $dogru++;
            ?>
                <h6 style="color:green" class="mt-2">correct answer</h6>
              <?php
                $final += $questionscore;
                //       $finally = $final;
              } else {
                $yanlis++;
              ?> 
                <h6 style="color:red" class="mt-2">Wrong answer the correct answer is :<?php echo $ansertrue; ?></h6>
            <?php
              }
            }

            ?>

            <?php $i = $i + 1 ?>
        </div>
        <hr> <br>
    <?php
          }
        }
      $resw= $final;

    ?>
 
  <?php
if (isset($_POST['gonder'])) {


    $selectquery = "SELECT * FROM users WHERE user_email ='$useremail'";
    $que = mysqli_query($con, $selectquery);

    if ($res = mysqli_fetch_array($que)) {
         $useid = $res[0];
    }
    $examname=mysqli_query($con,"SELECT * FROM result where user_id='$useid' And exam_id='$exam_id'");
    $nums= mysqli_num_rows($examname);
    if($nums == 1){
        
    }else{
    $insertqu = "insert into result ( user_id , exam_id ,right_number,wrong_number ,final_result) values('$useid','$exam_id','$dogru','$yanlis','$final')";
    mysqli_query($con, $insertqu);
    $selectresult = "SELECT final_result FROM result WHERE exam_id ='$exam_id'";
     $ortalama =0;
      $ort = mysqli_query($con, $selectresult);
      $nums= mysqli_num_rows($ort);
      while ($orts = @mysqli_fetch_array($ort)){
        $ortalama += $orts['final_result'] ;

      }
      $ortalama=$ortalama/$nums;
      
?>
  <h5 class="alert alert-info text-center" id="ort" style="margin-top: 10px;">sinif ortalamsi : <?php echo $ortalama ;?></h5>

<?php
      // $ort = "insert into ortalama ( ortalama ,exam_id) values ('$ortalama','$exam_id')";
      // mysqli_query($con, $ort);
    }
  }}
 
  ?> 


  <?php
  
  ?>
  <script>
    var ort =document.getElementById('ort');
    ort.innerHTML("sinif ortalamasi : " + <?php echo $ortalama;?>);
   
  </script>
  <div class="container">
  <button type="submit" class="btn btn-success button-gonder1" name='gonder' id="buttongonder">send answers</button>
  

  </div>
      </form>
<?php


     

?>


      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>