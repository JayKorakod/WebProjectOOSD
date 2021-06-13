<?php
    $conn = mysqli_connect('localhost','root','','casephone');

    if(!$conn){
        die('Please Check Your Connection' . mysqli_error($conn));
    }
?>