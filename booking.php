<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

$url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];
$array = explode(' ', $id);
$id_movie = $array[0];
$date = $array[1];
$time = $array[2];

// print_r($url);

// print_r($parts);

if (!isset($_SESSION["login"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
    <!-- custom css file link  -->
    <link rel="stylesheet" href="./assets/css/booking.css">
    <link rel="icon" href="./assets/img/logo.png">
    <title>Movie Seat Booking</title>
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
            <div class="line1"></div><span>ĐẶT VÉ</span>
            <div class="line2"></div>
        </div>

        <div class="container">
            <form action="<?php echo 'payment.php' . '?id=' . $id;?>" method="post"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="movie-container" method="post">
                            <h3>Ngày chiếu</h3>
                            <select id="b-date" name="date">';
                                <?php echo '<option value="' . $date . '">' . $date . '</option>'; ?>
                            </select>
                        </div>

                        <div class="movie-container">
                            <h3>Giờ chiếu</h3>
                            <select id="b-time" name="time">
                                <?php echo '<option value="' . $time . '">' . $time . '</option>'; ?>
                            </select>
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <span>Mã giảm giá :</span>
                                <input type="text" class="input-field" id="p-state" value="" name="discount">
                            </div>
                        </div>

                        <div class="flex">
                            <div class="inputBox">
                                <span>Ghế đã chọn:</span>
                                <input type="text" class="input-seats" name="selected_seat" id="selected_seat" required>
                            </div>
                        </div>

                        <input type="text" name="price" id="price" style="display:none ;">
                    </div>

                    <div class="col">
                        <div class="row" id="screen">Screen</div>
                        <div class="container" id="seat-cont">
                            <?php
                            $seat = 'A1,B1,C1,D1,E1,F1,G1,H1,I1,J1,A2,B2,C2,D2,E2,F2,G2,H2,I2,J2,A3,B3,C3,D3,E3,F3,G3,H3,I3,J3,A4,B4,C4,D4,E4,F4,G4,H4,I4,J3,A5,B5,C5,D5,E5,F5,G5,H5,I5,J5,A6,B6,C6,D6,E6,F6,G6,H6,I6,J6,A7,B7,C7,D7,E7,F7,G7,H7,I7,J7,A8,B8,C8,D8,E8,F8,G8,H8,I8,J8,A9,B9,C9,D9,E9,F9,G9,H9,I9,J9,A10,B10,C10,D10,E10,F10,G10,H10,I10,J10';
                            $array_seat = explode(',', $seat);

                            $sql = mysqli_query($conn, "SELECT * FROM `screenings` WHERE `id_movie` = '$id_movie' AND `day_playing` = '$date' AND `time_playing` = '$time'");
                            $row = $sql->fetch_array(MYSQLI_ASSOC);
                            $screenings_id = $row['screenings_id'];
                            $seat_empty = $row['seat_empty'];
                            $seat_selected = $row['seat_selected'];

                            $array_seat_empty = explode(',', $seat_empty);
                            $array_seat_selected = explode(',', $seat_selected);

                            for ($i = 0; $i < count($array_seat); $i++) {
                                echo '<div class="row">';
                                for ($j = 0; $j < 10; $j++) {
                                    $status = '';
                                    $disabled = '';
                                    if (in_array($array_seat[$i], $array_seat_selected)) {
                                        $status = 'sold';
                                    }
                                    echo '<div id="ab" class="seat ' . $status . '">' . $array_seat[$i] . '</div>';
                                    $i++;
                                }
                                $i--;
                                echo '</div>';
                            }
                            ?>
                        </div>
                        
                        <ul class="showcase">
                            <li>
                                <div class="seat available"></div>
                                <small>Available</small>
                            </li>
                            <li>
                                <div class="seat select"></div>
                                <small>Selected</small>
                            </li>
                            <li>
                                <div class="seat sold"></div>
                                <small>Sold</small>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="text">
                    Bạn chọn <span id="count_seat"></span> ghế. tổng số tiền là <span id="total_price"></span> VND
                </p>
                <input type="submit" value="Xác nhận thông tin" class="submit-btn" id="<?php echo $id; ?>">
            </form>
        </div>
        
    </div>

    

    <script src="./assets/js/script.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var selected_seat = [];
            $(".seat.sold").click(function () {
                // var price = selected_seat.length * 50000;
                $("#count_seat").text(selected_seat.length);
                $("#total_price").text(selected_seat.length * 50000);
                $("#selected_seat").val(selected_seat);
                $("#price").val(elected_seat.length * 50000);
            });
            
            $(".seat").click(function () {
                var s = $(this).text();
                if (selected_seat.includes(s)) {
                    var index = selected_seat.indexOf(s);
                    if (index !== -1) {
                        selected_seat.splice(index, 1);
                    }
                }
                else {
                    selected_seat.push(s)
                }
                // var price = selected_seat.length * 50000;
                $("#count_seat").text(selected_seat.length);
                $("#total_price").text(selected_seat.length * 50000);
                $("#selected_seat").val(selected_seat);
                $("#price").val(elected_seat.length * 50000);
               
            });
        });
    </script>
</body>