<?php
error_reporting(false);
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
             <a class="nav-link active1 active link" href="students.php">students <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item mar">
             <a class="nav-link link" href="grades.php">grades </a>
           </li>
           <li class="nav-item mar">
            <a class="nav-link link" href="questions.php">questions</a>
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
            <h4>all student</h4>
            <input id="myInput" type="text" placeholder="Search.."   class="form-control"  style="width: 50%;">

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">password</th>                  
                    <th scope="col">birthday</th>
                    <th scope="col">gender</th>
                    <th scope="col">delete</th>

                  </tr>
                </thead>
                <tbody id="myTable">
                  <?php
            
             $result=$con->query("SELECT * FROM users WHERE rol_id = 1");
              while($row = $result->fetch_assoc()){
             
                echo "<tr>";
                echo "<td>" .$row['users_id'] . "</td>";
                echo  "<td>" .$row['user_name'] . "</td>";
                echo "<td>" . $row['user_email'] . "</td>";
                echo "<td>" . $row['user_password'] . "</td>";
                echo "<td>" . $row['user_birthday'] . "</td>";
                echo"<td>" . $row['user_gender'] . "</td>";
                echo '<td><form >
                <button type="submit" class="btn btn-danger" name="delete" value="'. $row['users_id'] .'">delete</button>
                </form></td>';
                 
               echo "<tr>";

            }
            if(isset($_GET['delete'])){
                $id=$_GET['delete'];
               
                $con->query("DELETE FROM users WHERE users_id = $id");
                ?>
                <!-- <div class="container">
                <h6 class="alert alert-dark" >basariyle silinmistir   </h6>
                </div> -->
           <?php
            }

            ?>

                 
                </tbody>
              </table>

           </div>
     </section>
   





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>