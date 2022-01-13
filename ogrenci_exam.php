
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .disabled{
        pointer-events :none
      }
    </style>
    <title>Document</title>
</head>
<body>
<script>

// document.getElementById("#buttongonder").onClick(function(){
//        alert("kkkkkkkkk");
//        this.disabled= true;
// });

</script>
<script>
   var buton=0;
</script>
<?php
  error_reporting(false);
  session_start();
  if (isset($_SESSION['useremail'])) {
    $useremail = $_SESSION['useremail'];
   
  }
  $exam_id = isset($_GET['exam_id']) && is_numeric($_GET['exam_id']) ? intval($_GET['exam_id']) : 0;
  $buton =1;
  
  ?>
<?php
include 'database.php';
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
         <a class="nav-link active  link" href="ogrenci_exam.php">My Exams <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item mar">
         <a class="nav-link link" href="ogrenci_grades.php">My grades </a>
       </li>
       <li class="nav-item mar">
         <a class="nav-link link" href="exit.php">Exit </a>
       </li>

     </ul>
</div>
</div>
 </nav>
 <!-- <script>
       
       var a=getElementById("buttongonder");
       a.onclick = fun;
       function fun(){
        
               if( ==1){
               
               alert(<);
               a.disabled =true;
               buton++;
               }
            }
           
 </script>      -->
 <!-- <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload=""> -->
 <section>
           <div class="container">
            <h4>all my exams</h4>
            <form method="POST">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Exam number</th>
                    <th scope="col">Exam name</th>                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
            
            $result=$con->query("SELECT * FROM exams ");
             while($row = $result->fetch_assoc()){
             
               echo "<tr>";
               echo "<td>" .$row['exam_id'] . "</td>";
               echo  "<td>" .$row['exam_name'] . "</td>";
               
              ?>
              <td>
               <a  type="button" href="exam_questions.php?exam_id= <?php echo $row['exam_id'] ?>"  class="btn btn-success " disabled="disabled" id="buttongonder" name="start" value="<?php echo $row['exam_id']; ?>">start</a>
               </td>
                
             
           <?php }
            echo "<tr>";
          //  if(isset($_GET['start'])){
          //     // $id=$_GET['start'];
              
          //      header("Location: exam_questions.php");
               ?>   
                     
          <?php
           //}



           ?>  
                       
                </tbody>
              </table>
             </form>
           </div>
     </section>
   <?php 
    //  if(isset('start')){
    //   $buton++;
    //   echo  $buton;
    //  }
   ?>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>