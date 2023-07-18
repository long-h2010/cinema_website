<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page - Movies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
       
        <link rel="stylesheet" href="./css/index.css">
    </head>
    <body>
    <header>
        <!-- Start Header Navigation -->
            <div class="container">
                <nav>
                    <img src="./img/logo.png" alt="" class="logo">
                    <a href="./index.php" class="title">CINEMA</a>
                    <p>&emsp;&emsp;</p>
                    <div>
                       <!-- Start search field -->
                       <form action="search.php" class="search-bar" method="GET">
                            <input type="text" placeholder="Search..." name="keyword" style="color:white ;">
                            <button type="submit"><img src="./img/search.png" alt=""></button>
                        </form>
                        <!-- End search field -->
                    </div>
                    <?php
                        if(isset($_SESSION['fullname'])){
                            echo '&emsp;<ul><li style="width:100%;color: white"><a href="user_infor.php?id='.$_SESSION['id'].'">Welcome ' .$_SESSION["fullname"].'</a></li></ul>' ;
                        }
                        else{
                            echo '&emsp;&emsp;&emsp;&emsp;<ul><li style="width:100%;color: white; padding: 10px">Welcome Guest</li></ul>' ;
                        }
                    ?>
                </nav>
                <nav style="justify-content:center ;">
                    <ul>
                        <li><a href="./movie.php">Movies</a></li>
                    </ul>
                    <ul>
                        <li><a href="./about_us.php">About Us</a></li>
                    </ul>
                    <ul>
                        <li><a href="./contact_us.php">Contact Us</a></li>
                    </ul>
                    <?php
                        if(isset($_SESSION["login"])){
                            echo '<ul><li style="width:100% ;"><a href="./booked.php">Booked Ticket</a></li></ul>';
                        }
                        else{
                            echo '<ul style="display:none"><li style="width:100%;"><a href="./booked.php">Booked Ticket</a></li></ul>';      
                        }
                    ?>
                    <?php
                        if(isset($_SESSION["login"])){
                            echo '<ul style="display:none"><li><a href="./login.php">Log in</a></li></ul>';
                            echo '<ul><li><a href="./logout.php">Log out</a></li></ul>';
                        }
                        else{
                            echo '<ul style="display:none"><li><a href="./logout.php">Log out</a></li></ul>';
                            echo '<ul><li><a href="./login.php">Log in</a></li></ul>';                            
                        }
                    ?>
                </nav>
            </div>
             <!-- End Header Navigation -->
    </header>
    <!-- <style>
        /* id{
            align-items: ;
        } */
    </style> -->
    <main>
        <div class="container">
            <br>
            <div class="row">
                <div > 
                    <!-- class="col-12 col-sm-12 col-md-8 col-lg-8" -->
                    <!-- Start list PHIM DANG CHIEU -->
                    <br>
                    <img src="./img/bookedticket.png" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
                    <br>
                    <div class="row">
                        <?php
                            $id = $_SESSION['id'];
                            $sql = mysqli_query($conn,"SELECT * FROM `booked` WHERE `id_user` = '$id'");
                            $count_booked = mysqli_num_rows($sql);
                            if($count_booked == 0){
                                echo '<h6 style="color: white; font-size:20px; text-align:center"><i>Bạn chưa đặt vé nào!</i></h6>';
                            }
                            else{
                                while($row = $sql->fetch_array(MYSQLI_ASSOC)){
                                    $movie_name =  $row['movie_name'];
                                    $pre_date = $row['pre_date'];
                                    $pre_time = $row['pre_time'];
                                    $discount = $row['discount'];
                                    $seats = $row['seats'];
                                    $price = $row['price'];
                                    $room = $row['room'];
    
                                    $sql_booked = mysqli_query($conn, "SELECT * FROM `movie` WHERE `movie_name` LIKE '$movie_name'");
                                    while($row_booked = $sql_booked->fetch_array(MYSQLI_ASSOC)){
                                        $id_movie = $row_booked['id_movie'];
                                        $type = $row_booked['type'];
                                        $poster = $row_booked['poster'];
                                    }
                                    echo '
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <div class="card" id="'.$id_movie.'">
                                                <img src="poster/playing/' . $poster .'" class="card-img-top">
                                                <div class="p-1">
                                                    <h5>'.$movie_name.'</h5>
                                                    <p>Thể loại: '.$type.'</p>
                                                    <p>Ngày: '.$pre_date.'</p>
                                                    <p>Thời gian: '.$pre_time .'</p>
                                                    <p>Mã giảm giá: '.$discount .'</p>
                                                    <p>Ghế ngồi: '.$seats .'</p>
                                                    <p>Phòng rạp: '.$room .'</p>
                                                    <p>Thành tiền: '.$price .' VND</p>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

        <!-- Start footer main -->
        <div class="container-fluid mt-5">
            <div style ="background-color: #0e0402;" class="row justify-content-center p-5 ">
                <div style="color:#C3C3C3; padding: 10px" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <h5 class="verticalLine" id="footer">&nbsp;&nbsp;GIỚI THIỆU</h5>
                    <div class="footer">
                        <ul>
                            <li><a href="">&raquo; VỀ CHÚNG TÔI</a></li>
                            <li><a href="">&raquo; THỎA THUẬN SỬ DỤNG</a></li>
                            <li><a href="">&raquo; QUY CHẾ HOẠT ĐỘNG</a></li>
                            <li><a href="">&raquo; CHÍNH SÁCH BẢO MẬT</a></li>
                        </ul>
                    </div>
                </div>
                <div style="color:#C3C3C3; padding: 10px" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <h5 class="verticalLine">&nbsp;&nbsp;GÓC ĐIỆN ẢNH</h5>
                    <div class="footer">
                        <ul>
                            <li><a href="">&raquo; THỂ LOẠI PHIM</a></li>
                            <li><a href="">&raquo; BÌNH LUẬN PHIM</a></li>
                            <li><a href="">&raquo; BLOG ĐIỆN ẢNH</a></li>
                            <li><a href="">&raquo; PHIM HAY THÁNG</a></li>
                        </ul>
                    </div>
                </div>
                <div style="color:#C3C3C3; padding: 10px" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <h5 class="verticalLine">&nbsp;&nbsp;HỖ TRỢ</h5>
                    <div class="footer">
                        <ul>
                            <li><a href="">&raquo; GÓP Ý</a></li>
                            <li><a href="">&raquo; SALE & SERVICES</a></li>
                            <li><a href="">&raquo; RẠP / GIÁ VÉ</a></li>
                            <li><a href="">&raquo; TUYỂN DỤNG</a></li>
                        </ul>
                    </div>
                </div>
                <div style="color:#C3C3C3; padding: 10px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-top-box">
                        <h5 class="verticalLine">&nbsp;&nbsp;SOCIAL MEDIA</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div><br></div>
                <hr>
                <div style="color: #C3C3C3;" class="row">
                    <img class="col-xs-2 col-md-2 col-lg-2 col-xl-1" src="./img/logo.png" alt="" class="logo">
                    <p class="col-xs-12 col-sm- col-md-auto col-lg-auto col-xl-auto">Công Ty Cổ Phần Phim Thiên Ngân, Tầng 3, Toà Nhà Bitexco Nam Long, 63A Võ Văn Tần, P. Võ Thị Sáu, Quận 3, Tp. Hồ Chí Minh</p>
                </div>
            </div>
        </div>
        <!-- End footer of main -->
    </main>
    </body>
</html>