<?php
    session_start();
    require('connect.php');
    if(isset($_POST['payment'])){
        $revenue = $_SESSION['price'];
        $movie_name = $_SESSION['movie_name'];
        echo $revenue;
        $sql_pay = "UPDATE `movie` SET `sold` = (`sold` + 1), `revenue` = (`revenue` + '$revenue') WHERE `movie_name` LIKE '$movie_name'";
        mysqli_query($conn,$sql_pay);
        header("Location: index.php");
    }
?>