<?php
    //Create connection
    $conn = new mysqli("localhost", "root", "", "movie_theater");
    mysqli_set_charset($conn,"utf8");

    //Check connection
    if($conn->connect_error){
        die("Connect failed: " .$conn->connect_error);
    }
?>