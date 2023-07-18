<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
$url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];
$sql_playing = mysqli_query($conn, "SELECT * FROM `movie` WHERE `id_movie` = '$id'");
$sql_upcoming = mysqli_query($conn, "SELECT * FROM `upcoming_movie` WHERE `id_up_movie` = '$id' ");
$count = mysqli_num_rows($sql_playing);
if ($count == 1) {
    while ($row = $sql_playing->fetch_array(MYSQLI_ASSOC)) {
        $flag = true;
        $id_movie = $row['id_movie'];
        $movie_name = $row['movie_name'];
        $poster_movie = $row['poster'];
        $trailer = $row['trailer'];
        $type = $row['type'];
        $summary = $row['summary'];
        $nation = $row['nation'];
        $during = $row['during'];
        $premiere = $row['premiere'];
        $actor = $row['actor'];
        $director = $row['director'];
    }
} else {
    while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
        $flag = false;
        $id_movie = $row['id_up_movie'];
        $movie_name = $row['up_movie_name'];
        $poster_movie = $row['poster_up'];
        $trailer = $row['trailer_up'];
        $type = $row['type_up'];
        $summary = $row['summary_up'];
        $nation = $row['nation_up'];
        $during = $row['during_up'];
        $premiere = $row['premiere_up'];
        $actor = $row['actor_up'];
        $director = $row['director_up'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="./assets/img/logo.png">
    <title>Movies Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="./assets/css/detail.css">
</head>

<body>
<header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-none mx-auto p-4">
            <div class="container">
                <div class="navbar-brand logo_web">
                    <img src="./assets/img/logo.png" alt="" class="logo">
                    <a href="./index.php" class="title"><span style="color: white;">Light</span> CINEMA</a>
                </div>

                <div class="search">
                    <form action="search.php" class="search-bar">
                        <input type="text" placeholder="Tìm kiếm..." name="search">
                        <button type="submit" class="search-button"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <?php
                if (isset($_SESSION["login"])) {
                    echo
                        '<div class="dropdown navbar-right">
                            <span data-bs-toggle="dropdown">Welcome ' . $_SESSION["fullname"] . '
                                <i class="fa-solid fa-caret-down"></i>
                            </span>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">
                                    Trang cá nhân
                                    <i class="fa-solid fa-user"></i>
                                </a></li>

                                <li><a href="./logout.php" class="dropdown-item" href="#">
                                    Đăng xuất
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </a></li>
                            </ul>
                        </div>';
                } else {
                    echo '<ul style="display:none"><li><a href="./logout.php">Log out</a></li></ul>';
                    echo
                        '<a href="./login.php" class="navbar-signin navbar-right" style="text-decoration: none">
                            <span>Đăng nhập</span>
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>';
                }
                ?>
            </div>
        </nav>

        <div class="navbar-supported navbar-expand">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Phim
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width: 820px;height: max-content;">
                        <li>
                            <a class="dropdown-item" href="./list_movies.php?id=nowplaying" method="post">Phim đang chiếu</a>
                            <div class="row">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `movie`");
                                $count = 0;
                                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                                    if ($count >= 3) {
                                        break;
                                    }
                                    $id_movie_nav = $row['id_movie'];
                                    $movie_name_nav = $row['movie_name'];
                                    $poster_nav = $row['poster'];
                                    $id = "'" . $id_movie_nav . "'";
                                    $count++;

                                    echo
                                        '<div class="dropdown-card">
                                            <div class="card" id="' . $id_movie_nav . '" onClick="viewDetail(' . $id . ')">
                                                <img class="dropdown-card-img"
                                                    src="./assets/img/poster/playing/' . $poster_nav . '" alt="Card image">
                                                
                                                <div class="image-overlay">
                                                    <button href="#" class="btn btn-dark" style="height: 30px;">
                                                        <p style="font-size: 10px;">ĐẶT VÉ</p>
                                                    </button>
                                                </div>

                                                <div class="dropdown-card-body">
                                                    <h5 style="font-size: 15px;">' . $movie_name_nav . '</h5>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </li>

                        <li>
                            <a class="dropdown-item" href="./list_movies.php?id=comingsoon" method="post">Phim sắp chiếu</a>
                            <div class="row">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `upcoming_movie`");
                                $count = 0;
                                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                                    if ($count >= 3) {
                                        break;
                                    }
                                    $id_up_movie_nav = $row['id_up_movie'];
                                    $up_movie_name_nav = $row['up_movie_name'];
                                    $poster_up_nav = $row['poster_up'];
                                    $id = "'" . $id_up_movie_nav . "'";
                                    $count++;

                                    echo
                                        '<div class="dropdown-card">
                                            <div class="card" id="' . $id_up_movie_nav . '" onClick="viewDetail(' . $id . ')">
                                                <img class="dropdown-card-img"
                                                    src="./assets/img/poster/upcoming/' . $poster_up_nav . '" alt="Card image">
                                                
                                                <div class="image-overlay"></div>

                                                <div class="dropdown-card-body">
                                                    <h5 style="font-size: 15px;">' . $up_movie_name_nav . '</h5>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Góc điện ảnh
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./list_commentary.php">Bình luận phim</a></li>
                        <li><a class="dropdown-item" href="./list_blog.php">Blog điện ảnh</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sự kiện
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./list_promotion.php">Ưu đãi</a></li>
                        <li><a class="dropdown-item" href="#!">Phim hay tháng</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./support.php">Hỗ trợ</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION["login"]))
                        echo '<a class="nav-link" aria-current="page" href="./inforaccount.php?id='. $_SESSION["id"] . '">Thành viên</a>';?>
                </li>
            </ul>
        </div>
    </header>

    <main>
        <br>
        <br>
        <div class="head-name">
            <div class="line1"></div>THÔNG TIN PHIM<div class="line2"></div>
        </div>
        <!--  -->
        <section class="detail">
            <div class="container">
                <figure class="detail-banner">
                    <?php
                        echo '<img src="./assets/img/poster/detail/' . $poster_movie . '" alt="Free guy movie poster" style="width:100%">';
                    ?>
                </figure>

                <div class="detail-content">
                    <?php
                    if ($flag == true) {
                        echo '<p class="detail-subtitle">ĐANG CHIẾU</p>';
                    } else {
                        echo '<p class="detail-subtitle">SẮP CHIẾU</p>';
                    }
                    ?>

                    <?php echo '<h1 class="h1 detail-title">' . $movie_name . '</h1>'; ?>

                    <div class="meta-wrapper">
                        <?php echo '<div class="ganre-wrapper"><b>Quốc gia: </b>' . $nation . '</div>'; ?>
                        <?php echo '<div class="ganre-wrapper"><b>Thể loại: </b>' . $type . '</div>'; ?>
                        
                        <div class="date-time">
                            <div>
                                <?php echo '<b>Diễn viên: </b>' . $actor; ?>
                            </div>
                            <div>
                                <?php echo '<b>Đạo diễn: </b>' . $director; ?>
                            </div>
                        </div>

                        <div class="date-time">
                            <div>
                                <?php echo '<b>Khởi chiếu: </b>' . $premiere; ?>
                            </div>

                            <div>
                                <?php echo '<b>- Thời lượng: </b>' . $during; ?>
                            </div>

                        </div>

                    </div>

                    <h5><i>Tóm tắt nội dung:</i></h5>
                    <?php echo '<p class="storyline">' . $summary . '</p>'; ?>

                    <?php
                    if ($flag == true) {
                        echo '<div>
                                <a href="./select_screenings.php?id=' . $id_movie . '" class="booking-btn" style="text-decoration: none;">
                                    <div style="font-size: 16px; color:white">ĐẶT VÉ</div>
                                </a>
                            </div>';
                    }
                    ?>

                </div>
            </div>

            <br>
            <br>

            <div class="head-name">
                <div class="line1"></div>TRAILER<div class="line2"></div>
            </div>
            <br>
            <div class="cboxContent" style="display: flex;justify-content: center; align-items: center;">
                <div id="cboxLoadedContent" height="400" width="600" style="overflow: auto;">
                    <iframe width="560" height="315" src=" <?php echo $trailer; ?>" allowfullscreen></iframe>
                </div>
                <div id="cboxTitle" style="float: left; display: block;"></div>
                <div id="cboxCurrent" style="float: left; display: none;"></div>
                <button type="button" id="cboxPrevious" style="display: none;"></button>
                <button type="button" id="cboxNext" style="display: none;"></button>
                <button id="cboxSlideshow" style="display: none;"></button>
                <div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
                <div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
                <!-- <button type="button" id="cboxClose">close</button> -->
            </div>
        </section>
    </main>

    <footer>
        <div class="container-fluid">
            <div style="background-color: #0e0402;" class="row justify-content-center p-5 ">
                <div style="color:#C3C3C3; padding: 10px" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <h5 class="verticalLine">&nbsp;&nbsp;GIỚI THIỆU</h5>
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
                            <li><a href="">&raquo; RAP / GIÁ VÉ</a></li>
                            <li><a href="">&raquo; TUYỂN DỤNG</a></li>
                        </ul>
                    </div>
                </div>
                <div style="color:#C3C3C3; padding: 10px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-top-box">
                        <h5 class="verticalLine">&nbsp;&nbsp;KẾT NỐI LIGHT CINEMA</h5>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-top-box">
                        <h5 class="verticalLine">&nbsp;&nbsp;DOWNLOAD APP</h5>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>

        <div class="address">
            Công Ty Cổ Phần Phim Thiên Ngân, Tầng 3, Toà Nhà Bitexco Nam Long, 63A Võ Văn Tần, P. Võ Thị Sáu, Quận
            3, Tp. Hồ Chí Minh
        </div>
    </footer>
    
    <script type="text/javascript">
        $(document).ready(function () {
            document.getElementsByClassName('booking-btn')[0].addEventListener('click', function (event) {
                var movie_id = $(this).attr("id");
                var url = "/demo2/select_screenings.php" + "?id=" + movie_id;
                window.location.href = url;
            });
        });
    </script>
    <script src="./assets/js/view_detail.js"></script>
</body>

</html>