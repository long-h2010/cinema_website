<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
$url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id_web = $query['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="./assets/img/logo.png">
    <title>Cinema | Movies</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="./assets/css/index.css">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Phim
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="width: 820px;height: max-content;">
                        <li>
                            <a class="dropdown-item" href="./list_movies.php?id=nowplaying">Phim đang chiếu</a>
                            <div class="row">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `movie`");
                                $count = 0;
                                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                                    if ($count >= 3) {
                                        break;
                                    }
                                    $id_movie = $row['id_movie'];
                                    $movie_name = $row['movie_name'];
                                    $poster = $row['poster'];
                                    $id = "'" . $id_movie . "'";
                                    $count++;

                                    echo
                                        '<div class="dropdown-card">
                                            <div class="card" id="' . $id_movie . '" onClick="viewDetail(' . $id . ')">
                                                <img class="dropdown-card-img"
                                                    src="./assets/img/poster/playing/' . $poster . '" alt="Card image">
                                                
                                                <div class="image-overlay">
                                                    <a href="./select_screenings.php?id=' . $id_movie . '" class="btn btn-dark" style="height: 30px;">
                                                        <p style="font-size: 10px;">ĐẶT VÉ</p>
                                                    </a>
                                                </div>

                                                <div class="dropdown-card-body">
                                                    <h5 style="font-size: 15px;">' . $movie_name . '</h5>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>
                            </div>
                        </li>

                        <li>
                            <a class="dropdown-item" href="./list_movies.php?id=comingsoon">Phim sắp chiếu</a>
                            <div class="row">
                                <?php
                                $sql = mysqli_query($conn, "SELECT * FROM `upcoming_movie`");
                                $count = 0;
                                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                                    if ($count >= 3) {
                                        break;
                                    }
                                    $id_up_movie = $row['id_up_movie'];
                                    $up_movie_name = $row['up_movie_name'];
                                    $poster_up = $row['poster_up'];
                                    $id = "'" . $id_up_movie . "'";
                                    $count++;

                                    echo
                                        '<div class="dropdown-card">
                                            <div class="card" id="' . $id_up_movie . '" onClick="viewDetail(' . $id . ')">
                                                <img class="dropdown-card-img"
                                                    src="./assets/img/poster/upcoming/' . $poster_up . '" alt="Card image">
                                                
                                                <div class="image-overlay"></div>

                                                <div class="dropdown-card-body">
                                                    <h5 style="font-size: 15px;">' . $up_movie_name . '</h5>
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
                        <li><a class="dropdown-item" href="./list_actor.php">Diễn viên</a></li>
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
        <!-- TABS -->
        <div class="tabs">
            <div class="tab-item 
            <?php if ($id_web == "nowplaying") {
                echo 'active';
            } ?>">
                <i class="fa-solid fa-play"></i>
                Phim đang chiếu
            </div>
            <div class="tab-item
            <?php if ($id_web == "comingsoon") {
                echo 'active';
            } ?>">
                <i class="fa-solid fa-hourglass-start"></i>
                Phim sắp chiếu
            </div>
            <div class="line"></div>
        </div>'
        ?>
        <!-- LIST MOVIES -->
        <div class="container row tab-content">
            <div class="movies-grid tab-pane 
            <?php if ($id_web == "nowplaying") {
                echo 'active';
            } ?>">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM `movie`");
                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                    $id_movie = $row['id_movie'];
                    $movie_name = $row['movie_name'];
                    $poster = $row['poster'];
                    $type = $row['type'];
                    $during = $row['during'];
                    $id = "'" . $id_movie . "'";

                    echo
                        '<div class="movie-card" id="' . $id_movie . '" onClick="viewDetail(' . $id . ')">
                            <div class="card-head">
                                <img src="./assets/img/poster/playing/' . $poster . '" class="card-img">

                                <div class="card-overlay">
                                    <a href="./select_screenings.php?id=' . $id_movie . '" class="buyticket" style="text-decoration: none">
                                        <ion-icon name="ticket-outline"></ion-icon>
                                        <span>ĐẶT VÉ</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5>' . $movie_name . '</h5>
                                <p>Thể loại: ' . $type . '</p>
                                <p>Thời lượng: ' . $during . '</p>
                            </div>
                        </div>';
                }
                ?>
            </div>

            <div class="movies-grid tab-pane
            <?php if ($id_web == "comingsoon") {
                echo 'active';
            } ?>">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM `upcoming_movie`");
                while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                    $id_up_movie = $row['id_up_movie'];
                    $up_movie_name = $row['up_movie_name'];
                    $poster_up = $row['poster_up'];
                    $type_up = $row['type_up'];
                    $premiere_up = $row['premiere_up'];
                    $id = "'" . $id_up_movie . "'";

                    echo
                        '<div class="movie-card" id="' . $id_up_movie . '" onClick="viewDetail(' . $id . ')">
                            <div class="card-head">
                                <img src="./assets/img/poster/upcoming/' . $poster_up . '" class="card-img">

                            </div>
                            <div class="card-body">
                                <h5>' . $up_movie_name . '</h5>
                                <p>Thể loại: ' . $type_up . '</p>
                                <p>Ngày phát hành: ' . $premiere_up . '</p>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
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

    <script>
        function viewDetail(movie_id) {
            var url = "demo2/movie_details.php?id=" + movie_id;
            window.location.href = url;
        }
    </script>
    <script>
        $(".carousel-inner").slick({
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            mobileFirst: true
        });
    </script>
    <script src="./assets/js/tabs.js"></script>
    <script src="./assets/js/view_detail.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>


</html>