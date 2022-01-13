<?php
include 'database.php';
error_reporting(false);
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
    <title>Document</title>
</head>
<body>
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
             <a class="nav-link active1  link" href="students.php">students <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item mar">
             <a class="nav-link link" href="grades.php">grades </a>
           </li>
           <li class="nav-item mar">
            <a class="nav-link active link" href="questions.php">questions</a>
          </li> 
         <li class="nav-item mar">
               <a class="nav-link link" href="admins.php">admins</a>
        </li>
        <li class="nav-item mar">
         <a class="nav-link link" href="exit.php">Exit </a>
       </li>
         </ul>
         
      
    </div>
   </div>
     </nav>
  
     <?php
        
        $beforupdatequestion="";
        $beforupdatequescore="";
        $beforupdateAop="";
        $beforupdateBop="";
        $beforupdateCop="";

    if(isset($_POST["editbutton"])){ 
        $key=$_POST["editbutton"];  
      //  echo $key;
    //    $queryforname = mysqli_query($con,"SELECT * FROM lessons WHERE lesson_id ='$key'");
        $res=mysqli_query($con,"SELECT * FROM questions WHERE question_id ='$key'");
        if($res){
            while($row = mysqli_fetch_row($res)){
                $beforupdateid=$row[0];
                $beforupdatequestion= $row[1];
                $beforupdateAop= $row[2];
                $beforupdateBop= $row[3];
                $beforupdateCop= $row[4];
                $_POST['trueanswer']=$row[5];
                $beforupdatequescore= $row[6];
                $beforupdateexams=$row[7];
        
            }}       

        } 
        
?>
<section>
    <div class="container">
      <form  method="POST">
      <div class="quesionid" ><br>
            <input type="hidden"  class="forquid" id=" form-control " name="quid" value="<?php echo  $beforupdateid; ?>"  style="width: 65%;">
        </div>  
        <div class="" style="width: 65%;">
            <label for="question" class="mt-4 style-label">Question :</label>
            <input rows="3" cols="5" type="text"  value="<?php echo  $beforupdatequestion; ?>" name="question" class="form-control " id="question" placeholder="enter question" > 
        </div>
        <div class=" ">
            <label for="option3" class="my-1 style-label label-option">Question Score:</label>
            <input type="number" value="<?php echo  $beforupdatequescore; ?>" class="form-control "name="questionscore" id="option3" placeholder=" Enter Score question" style="width: 40%;">
           
        </div>
        <div class="option">
            <label for="option1" class="my-1 style-label label-option"> A:</label>
            <input type="text" value="<?php echo  $beforupdateAop; ?>" class="form-control " id="option1 "name="Aoption" placeholder="first option" style="width: 40%;">
        </div>
        <div class="option option22">
            <label for="option2" class="my-1 style-label label-option"> B:</label>
                <input type="text"value="<?php echo  $beforupdateBop; ?>" class="form-control" id="option2"name="Boption" placeholder=" secound option" style="width: 40%;">
        </div>

        <div class="option ">
            <label for="option3" class="my-1 style-label label-option"> C:</label>
            <input type="text" value="<?php echo  $beforupdateCop; ?>"  class="form-control " id="option3"name="Coption" placeholder=" third option" style="width: 40%;">
           
        </div>
             <label for="" class="my-1 style-label label-option ">true answer :</label>
             <span>A</span>
             <input type="radio" name="trueanswer" value="A">
             <span class="mx-3">
             <span>B</span>
             <input type="radio" name="trueanswer" value="B">
           </span>
             <span>C</span>
             <input type="radio" name="trueanswer" value="C">
        <div> 

        </div>
        <span>Exam name :</span>
        <select name="exams" value="<?php echo  $beforupdateexams; ?>" id="" class="selectoption" >
            <option hidden> select exam</option>
            <?php
                 $exams = @mysqli_query($con, "SELECT * FROM exams");

                  if (@mysqli_num_rows($exams) == 0)
                          echo "Errro: No departmets founded";
                  else {

                 while ($exam = @mysqli_fetch_array($exams))
                        echo "<option value='" . $exam['exam_id'] . "'>" . $exam['exam_name'] . "</option>";
                }
            ?>

          </select>
          <?php 
                  $exams="";
                $question = "";
                $questionscore= "";
                $Aoption= "";
                $Boption= "";
                $Coption= "";
                $trueanswer= "";
                $quid = $_POST['quid'];
                if (isset($_POST["exams"])) {

                    $exams = $_POST['exams'];
                }
               
                if (isset($_POST["question"])) {

                    $question = $_POST['question'];
                }
                if (isset($_POST["questionscore"])) {

                    $questionscore = $_POST['questionscore'];
                }
                if (isset($_POST["Aoption"])) {

                    $Aoption = $_POST['Aoption'];
                }
                if (isset($_POST["Boption"])) {

                    $Boption = $_POST['Boption'];
                }
                if (isset($_POST["Coption"])) {

                    $Coption =  $_POST['Coption'];

                }
                if (isset($_POST["trueanswer"])) {

                    $trueanswer = $_POST['trueanswer'];

                }

                
                if (isset($_POST["insertque"])) {
                    $res=mysqli_query($con,"SELECT * FROM questions WHERE question_id ='$quid'"); 
                    $num = mysqli_num_rows($res);
                     //echo $num;
                    if($num > 0){ 
                       //echo $question.$Aoption.$Boption.$Coption.$trueanswer.$questionscore.$exams;
                        $selectquerylessonnid = "UPDATE questions SET question ='$question', answer_A ='$Aoption', 
                        answer_B='$Boption', 
                        answer_C='$Coption', true_answer='$trueanswer', question_score='$questionscore', exam_id='$exams' 
                        WHERE question_id='$quid'";
                        mysqli_query($con,$selectquerylessonnid);
                      
                      
                    ?>
                    <!-- <h6 class="alert " >basariyle guncelenmistir  </h6> -->
        <?php
                }else{
                            $insertqu = "insert into questions ( question , answer_A , answer_B , answer_C , true_answer , question_score , exam_id) values('$question','$Aoption','$Boption','$Coption','$trueanswer','$questionscore','$exams')";
                            mysqli_query($con, $insertqu);


                        ?>
                           <h6 class="alert " >basariyle eklenmistir </h6>
                <?php

                     
               
                    }}
                ?>
          <div>

        <button type="submit"  name="insertque" class="btn btn-success my-3" >insert</button>
            
        <button type="reset" class="btn btn-dark my-3" id="" >clear</button>
        </div>
        
      </form>
    
</div>
                 
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
 $("#myInput").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTable tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
</script>

     <section>
           <div class="container">
            <h4>all questions</h4>
            <input id="myInput" type="text" placeholder="Search.."   class="form-control"  style="width: 50%;">
            <form method="POST">
            <table class="table">
                <thead class="thead-dark ">
                    <tr>
                    
                      <th scope="col"> question</th>
                      <th scope="col">A option </th>
                      <th scope="col">B option </th>
                      <th scope="col">C option</th>
                      <th scope="col">true answer </th>
                      <th scope="col">exam</th>
                      <th scope="col">score </th>
                      <th scope="col">control </th>
          
      
                    </tr>
                  </thead>
                <tbody id="myTable">
                <?php       
                
                $selectquery = "select * from questions ";
                $query = mysqli_query($con,$selectquery);
                $nums= mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)){
                    $selectdepartmentname = "select * from exams where exam_id =".$res['exam_id'];
                    $query2 = mysqli_query($con,$selectdepartmentname);
                    $nums2= mysqli_num_rows($query2);
                    while($res1 = mysqli_fetch_array($query2)){

                
                
                ?>

              <tr>
                <td><?php echo $res['question']; ?></td>
                <td><?php echo $res['answer_A']; ?></td>
                <td><?php echo $res['answer_B']; ?> </td>
                <td><?php echo $res['answer_C']; ?></td>
                <td><?php echo $res['true_answer']; ?></td>
                <th scope="row"><?php echo $res1['exam_name']; ?></th>
                <td><?php echo $res['question_score']; ?></td>
                <td> 
                <button type="submit" id="delete" value="<?php echo $res['question_id'] ;?>" name ="deletebutton" class="btn btn-danger">delete</button>                  
                <button type="submit"value="<?php echo $res['question_id'] ;?>" name="editbutton" class="btn btn-warning">edit</button>
              </td>

              </tr>
           <?php
                    }}
           ?>
                  
                </tbody>
              </table>
              </form>
              <?php
    
    if(isset($_POST["deletebutton"])){ 
         $key=$_POST["deletebutton"];  
         //echo $key;
         $selectquerylessonnid = "DELETE from questions WHERE question_id ='$key'";
         $query3 = mysqli_query($con,$selectquerylessonnid);
         mysqli_query($con,$query3);
         }
         ?>  
           </div>
     </section>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>