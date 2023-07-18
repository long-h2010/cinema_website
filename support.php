<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="./assets/img/logo.png">
    <title>Cinema | Home</title>
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
    <link rel="stylesheet" href="./assets/css/support.css">
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
                                <li><a class="dropdown-item" href="./inforaccount.php?id='. $_SESSION["id"] . '">
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
                            <a class="dropdown-item" href="./list_movies.php?id=nowplaying" method="post">Phim đang chiếu</a>
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
                        <li><a class="dropdown-item" href="#">Phim hay tháng</a></li>
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
        <div class="tabs">
            <div class="tab-item active">
                <i class="fa-solid fa-play"></i>
                Góp ý
            </div>
            <div class="tab-item">
                <i class="fa-solid fa-hourglass-start"></i>
                Giải đáp
            </div>
            <div class="tab-item">
            <i class="fa-brands fa-hire-a-helper"></i>
                Tuyển dụng
            </div>
            <div class="line"></div>
        </div>

        <div class="container tab-content">
            <div class="row tab-pane active">
                <!-- Start Get in Touch block  -->
                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form-left">
                        <h2>BẠN CẦN HỖ TRỢ TỪ <span style="color: red;">LIGHT CINEMA</span> ?</h2>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Họ và tên" required data-error="Hãy nhập tên của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" id="email" name="email"
                                            class="form-control" required data-error="Hãy nhập email của bạn">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Chủ đề" required data-error="Hãy nhập chủ đề">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Tin nhắn"
                                            name="message" rows="4" data-error="Hãy viết tin nhắn" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="submit-button text-center">
                                        <button class="btn btn-danger" id="submit" type="submit">GỬI TIN NHẮN</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Contact Us block  -->

                <!-- End Contact Us  -->

                <!-- Start Contact Info block  -->
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-right">
                        <h2>THÔNG TIN LIÊN LẠC</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: 63A Võ Văn Tần, P. Võ Thị Sáu<br>, Quận
                                    3, Tp. Hồ Chí Minh</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+123456789">+123456789</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a
                                        href="support@gmail.com">support@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Contact Info block  -->
            </div>

            <div class="container mt-1 tab-pane">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item" style="color: black;">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Tôi có thể dùng tài khoản thành viên của mình để mua vé nhóm được không?
                            </button>
                        </h2>

                        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    Bạn có thể cung cấp mã barcode trên mobile app/thẻ thành viên trong quá trình giao
                                    dịch mua vé nhóm để được tích điểm bạn nhé, tuy nhiên mỗi tài khoản chỉ áp dụng giá
                                    vé thành viên tối đa 8 vé/ngày bạn nhé.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Làm sao để khiếu nại hoặc góp ý với Galaxy?
                            </button>
                        </h2>

                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    Khi có bất kỳ khiếu nại, hoặc vấn đề phát sinh với dịch vụ của Galaxy Cinema, quý
                                    khách vui lòng gọi hotline 19002224 hoặc gửi thông tin đến email:
                                    hotro@galaxy.com.vn hoặc gửi tin nhắn đến fanpage Facebook chính thức của Galaxy
                                    Cinema tại địa chỉ: https://facebook.com/galaxycine.vn
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Thanh toán online đã bị trừ tiền nhưng không nhận được mã đặt vé?
                            </button>
                        </h2>

                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    Bạn có thể inbox qua fanpage Facebook chính thức của Galaxy Cinema tại địa chỉ
                                    https://facebook.com/galaxycine.vn hoặc liên hệ với hotline 19002224 để được hỗ trợ
                                    bạn nhé (Thời gian làm việc từ 8:00 đến 22:00 hàng ngày)
                                    Cập nhật lại thời gian của thẻ ATM từ 7 đến 15 ngày làm việc, thẻ Visa/Master từ 7
                                    đến 45 ngày làm việc (không tính Cuối tuần và Ngày Lễ)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Tôi có thể hủy hoặc thay đổi thông tin của vé đã mua online được không?
                            </button>
                        </h2>

                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    Theo quy định của Galaxy vé đã mua thành công rồi thì không thể hủy/thay đổi thông
                                    tin được ạ. Tuy nhiên, trong trường hợp bạn không thể sắp xếp xem đúng suất chiếu mà
                                    bạn đã đặt nhầm, bạn vui lòng mang mã đặt vé đến trực tiếp tại rạp trước suất chiếu
                                    và liên hệ Ban quản lý để được hỗ trợ bạn nhé.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane">
                <div class="accordion accordion-long" id="accordionExample">
                    <div class="accordion-item" style="color: black;">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Giám đốc kinh doanh cấp cao
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    <h4>MÔ TẢ CÔNG VIỆC</h4>
                                    <p>- Thực hiện các nhiệm vụ được giao bởi cấp trên trực tiếp</p>
                                    <p>- Đảm bảo đáp ứng được chỉ tiêu doanh số quản lý đặt ra</p>
                                    <p>- Theo dõi và thực hiện công tác chăm sóc khách hàng cùng với các nhân sự phòng
                                        kinh doanh theo sự phân công của cấp trên trực tiếp.</p>
                                    <p>- Lên kế hoạch, tìm kiếm và tập hợp thông tin khách hàng. Phát triển khách hàng
                                        mới.</p>
                                    <p>- Chuẩn bị proposal, bài thuyết trình và báo giá.</p>
                                    <h4>YÊU CẦU CÔNG VIỆC</h4>
                                    <h5>Yêu cầu (bằng cấp và kinh nghiệm)</h5>
                                    <p>- Tốt nghiệp đại học, cao đẳng;</p>
                                    <p>- Nghe, nói, viết Tiếng Anh tốt;</p>
                                    <p>- Thành thạo Ms Office, Ms Excel.</p>
                                    <h5>Kỹ năng yêu cầu</h5>
                                    <p>- Tối thiểu 5 năm ở vị trí nhân viên kinh doanh;</p>
                                    <p>- Ưu tiên ứng viên đã từng làm việc trong ngành media, ngân hàng, bán lẻ…;</p>
                                    <p>- Có khả năng giao tiếp, thuyết trình, thương lượng và thuyết phục khách hàng
                                        tốt;</p>
                                    <p>- Năng động, độc lập và có trách nhiệm;</p>
                                    <h4>THÔNG TIN LIÊN HỆ</h4>
                                    <p>Công ty: Công Ty Cổ Phần Phim Thiên Ngân (LIGHT STUDIO)</p>
                                    <p>Người liên hệ: HR. Dept</p>
                                    <p>Email: hieu.nt@galaxy.com.vn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Nhân viên giám sát
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    <h4>MÔ TẢ CÔNG VIỆC</h4>
                                    <p>- Quản lý & đào tạo nghiệp vụ nhân viên Guest service/</p>
                                    <p>- Hỗ trợ Quản Lý Rạp kiểm soát và tuân thủ quy trình hoạt động, hướng đến sự tăng
                                        trưởng và phát triển của đơn vị kinh doanh đạt kết quả cao nhất có thể.</p>
                                    <p>- Quản lý vận hành quầy vé & quầy căn-tin, nhập xuất hàng hóa, nhận hóa đơn chứng
                                        từ kế toán và xác nhận doanh thu.</p>
                                    <h4>YÊU CẦU CÔNG VIỆC</h4>
                                    <h5>Yêu cầu (bằng cấp và kinh nghiệm)=</h5>
                                    <p>- Tốt nghiệp đại học, cao đẳng;</p>
                                    <p>- Nghe, nói, viết Tiếng Anh tốt;</p>
                                    <p>Tối thiểu 2 năm kinh nghiệm ở vị trí giám sát quản lý từ 5 tới 10 nhân viên.</p>
                                    <h5>Kỹ năng yêu cầu</h5>
                                    <p>- Có thể làm việc theo ca (8h-16h/ 16h-0h)./</p>
                                    <p>- Tác phong chỉnh tề, lịch sự.</p>
                                    <p>- Có khả năng kiểm soát, giải quyết vấn đề phát sinh mà không cần xin ý kiến cấp
                                        trên.</p>
                                    <p>- Có khả năng phân tích, trình bày, diễn giải và training.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Hình thức nộp hồ sơ
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div>
                                    <h4>MÔ TẢ CÔNG VIỆC</h4>
                                    <p>- Quản lý & đào tạo nghiệp vụ nhân viên Guest service/</p>
                                    <p>- Hỗ trợ Quản Lý Rạp kiểm soát và tuân thủ quy trình hoạt động, hướng đến sự tăng
                                        trưởng và phát triển của đơn vị kinh doanh đạt kết quả cao nhất có thể.</p>
                                    <p>- Quản lý vận hành quầy vé & quầy căn-tin, nhập xuất hàng hóa, nhận hóa đơn chứng
                                        từ kế toán và xác nhận doanh thu.</p>
                                    <h4>YÊU CẦU CÔNG VIỆC</h4>
                                    <h5>Yêu cầu (bằng cấp và kinh nghiệm)=</h5>
                                    <p>- Tốt nghiệp đại học, cao đẳng;</p>
                                    <p>- Nghe, nói, viết Tiếng Anh tốt;</p>
                                    <p>Tối thiểu 2 năm kinh nghiệm ở vị trí giám sát quản lý từ 5 tới 10 nhân viên.</p>
                                    <h5>Kỹ năng yêu cầu</h5>
                                    <p>- Có thể làm việc theo ca (8h-16h/ 16h-0h)./</p>
                                    <p>- Tác phong chỉnh tề, lịch sự.</p>
                                    <p>- Có khả năng kiểm soát, giải quyết vấn đề phát sinh mà không cần xin ý kiến cấp
                                        trên.</p>
                                    <p>- Có khả năng phân tích, trình bày, diễn giải và training.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="./assets/js/view_detail.js"></script>
    <script src="./assets/js/tabs.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>