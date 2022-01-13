<?php
    $con = mysqli_connect('localhost','root','','online_exam');

    if(!$con){
        echo 'connection error' . mysqli_connect_errno();

    }
   