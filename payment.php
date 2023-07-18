<?php
    session_start();
    require('connect.php');

    if(!isset($_SESSION["login"])){
        header("location:login.php");
    }
    
    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str($parts['query'],$query);
    $id = substr($query['id'],0,6);
    // print_r($parts);

    // $array = explode(' ', $id);
    // $id_movie = $array[0];
    // $date = $array[1];
    // $time = $array[2];

    function createTicketID($old_id){
        $char = substr($old_id, 0, 2);
        $num_id = (int) substr($old_id,2) + 1;
        $new_id = '';
        for($i = 0; $i < (4-strlen((string) $num_id)); $i++){
            $new_id = $new_id . "0";
        }
        return $char . $new_id . $num_id;

    }

    $sql_playing = mysqli_query($conn,"SELECT * FROM `movie` WHERE `id_movie` = '$id'");
    $count = mysqli_num_rows($sql_playing);
    if($count == 1){
        $time = '';
        $date = '';
        $discount = '';
        $seats = '';
        $price = '';
        while($row = $sql_playing->fetch_array(MYSQLI_ASSOC)){
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['movie_name'] = $row['movie_name'];
            $time = $_POST['time'];
            $date = $_POST['date'];
            $discount = $_POST['discount'];
            $seats = $_POST['selected_seat'];
            $price = $_POST['price'];
            $id_movie = $row['id_movie'];
            $movie_name =  $row['movie_name'];
            $poster = $row['poster'];
            $type = $row['type'];
            $summary = $row['summary'];
            $nation = $row['nation'];
            $during = $row['during'];
            $premiere = $row['premiere'];
            $actor = $row['actor'];
            $director = $row['director'];
        }

        $check_booked = mysqli_query($conn,"SELECT * FROM `booked`");
        if(mysqli_num_rows($check_booked) != 0){
            $recent_id = mysqli_query($conn,"SELECT * FROM `booked` ORDER BY `id_ticket` DESC LIMIT 1");
            while($row = mysqli_fetch_assoc($recent_id)){
                $last = $row["id_ticket"];
            }
            $id_ticket = createTicketID($last);
        }
        else{
            $id_ticket = createTicketID("TK0000");
        }

        $sql_room = "SELECT * FROM `room` ORDER BY RAND() LIMIT 1";
        $sql_room_run = mysqli_query($conn,$sql_room);
        while($row_room = $sql_room_run->fetch_array(MYSQLI_ASSOC)){
            $room = $row_room['room_number'];
        }
        $sql_booked = "INSERT INTO `booked`VALUES(?,?,?,?,?,?,?,?)";
        $stm = $conn -> prepare($sql_booked);
        $stm -> bind_param("ssssssss",$id_ticket,$_SESSION['id'],$movie_name,$date,$time,$discount,$seats,$room);
        if(!$stm->execute()){
            die($stm->error);
        }
    }
    // print_r($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./assets/css/payment.css">

</head>
<body>
    <div class="full-page">
    <div class="navbar">
            <div class="navbar-brand logo_web">
                <img src="./assets/img/logo.png" alt="" class="logo">
                <a href="./index.php" class="title"><span style="color: white;">Light</span> CINEMA</a>
            </div>
        </div>
        <br>
        <br>
        <div class="head-name">
            <div class="line1"></div><span>THÔNG TIN THANH TOÁN</span>
            <div class="line2"></div>
        </div>
        <div class="container">
            <form action="payment_handle.php" method="post">
                <div class="row">
                    <div class="col">
                        <h3 class="title">User Information</h3>
                        <div class="inputBox">
                            <span>Full name :</span>
                            <?php echo '--  '. $_SESSION['fullname']; ?>
                        </div>
                        <div class="inputBox">
                            <span>Email :</span>
                            <?php echo '--  '. $_SESSION['email']; ?>
                        </div>
                        
                        <div class="inputBox">
                            <span>Username :</span>
                            <?php echo '--  '. $_SESSION['username']; ?>
                        </div>

                        <br>
                        <h3 class="title">Payment</h3>
                        <div class="inputBox">
                            <span>Cards accepted :</span>
                            <img src="./assets/img/card_img.png" alt="">
                        </div>

                    </div>

                    <div class="col">

                        <h3 class="title">Ticket Information</h3>

                        <div class="inputBox">
                            <span>Movie Name :</span>
                            <?php echo '--  '. $movie_name;?>
                        </div>
                        <div class="inputBox">
                            <span>Date :</span>
                            <?php echo '--  '. $date;?>
                        </div>
                        <div class="inputBox">
                            <span>Time :</span>
                            <?php echo '--  '. $time .':00 AM';?>
                        </div>
                        <div class="inputBox">
                            <span>Selected Seats :</span>
                            <?php echo '--  '. $seats;?>
                        </div>
                        <div class="inputBox">
                            <span>Room :</span>
                            <?php echo '--  '. $room;?>
                        </div>
                        <div class="inputBox">
                            <span>Discount :</span>
                            <?php
                                if(isset($_POST['discount'])){
                                    echo '--  '. $discount;
                                }
                                else{
                                    echo '--  None';
                                }
                            ?>
                        </div>

                        <div class="inputBox">
                            <span>Total :</span>
                            <span name="total-price">
                            <?php $count=0; $price=0;;$a = str_replace(",", " ", $seats) ;
                                    $count = str_word_count($seats);
                                    $price = $count*50000;
                                    echo '-- ' . $price .' VND';                                    
                            ?>
                            </span>
                        </div>

                    </div>
            
                </div>
                
                <div class="alert">
                    <input type="submit" value="Thanh toán" class="submit-btn" id="pay" onclick="showSuccess()" name="payment">
                </div>

            </form>

        </div>            

    </div>
</body>
<script type="text/javascript">
    function showSuccess(){
        alert("Bạn đã đặt vé thành công! Vào [trang cá nhân (thành viên)->lịch sử đặt vé] để kiểm tra");
    }
</script>
</html>