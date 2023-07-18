<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

if (!isset($_SESSION["manager"])) {
    header("location:login.php");
}

if (isset($_GET['id'])) {
    $id_check = '';
    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $id_check = $query['id'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="./assets/img/logo.png">
    <title>Manager Site</title>
    <link rel="stylesheet" href="./assets/css/manager.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />


    <style>

        .columns {
            border: 2px solid darkgrey;
            border-radius: 5px;
            padding-top: 15px;
        }

        .alert {
            max-width: 500px;
            margin: auto;
        }

        .add {
            font-size: 20px;
            border-top: 1px solid #000000;
            border-right: 1px solid #000000;
            border-bottom: 1px solid #000000;
            border-left: 1px solid #000000;
            padding: 8px;
            text-decoration: none;
            background-color: #583c3c;
            color: #ffffff;
            border-radius: 20px;
            font-family: 'Arial';
        }

        .add:hover {
            background-color: rgb(229, 143, 143);
            color: #000000;
            font-weight: bold;
            text-decoration: none;
        }
        #dashboard {
            padding-top: 20px;
        }

        #dashboard h3 {
            padding: 20px;
            font-weight: bold;
            color: #a90823;
        }

        #db {
            padding: auto;
            margin: 0 50px;
            font-size: 16px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <?php
        if (isset($_SESSION["manager"])) {
            echo '<h1>Welcome ' . $_SESSION["fullname_manager"] . '</h1>';
        }
        ?>
        <a style="text-decoration: none" href="#dashboard">Dashboard</a>
        <a style="text-decoration: none" href="#user">User</a>
        <a style="text-decoration: none" href="#movies">Movies - Now Playing And Statistical</a>
        <a style="text-decoration: none" href="#upcoming">Upcoming</a>
        <a style="text-decoration: none" href="#promotion">Promotion</a>
        <a style="text-decoration: none" href="#blog">Blog</a>
        <a style="text-decoration: none" href="#commentary">Commentary</a>
        <a style="text-decoration: none" href="#actor">Actor</a>
        <a style="text-decoration: none" href="#screenings">Screenings</a>
        <a style="text-decoration: none" href="./logout.php" class="logout">
            Log out
            <i class="fa-solid fa-right-from-bracket" style="margin-left: 45%;"></i>
        </a>
    </div>

    <!-- dashboard -->
    <div class="content">
        <div id="dashboard">
            <h3 class="mainContent-title">DASHBOARD</h3>
            <div class="row card-list" id="db">
                <div class="col-md-3">
                    <div class="card shadow border-primary mb-3" style="border-left: .25rem solid #4e73df;border-radius: 0.36rem">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#4e73df ">Tổng doanh Thu</h5>
                            <?php
                            $sql_revenue = mysqli_query($conn, "SELECT SUM(revenue) FROM `movie`");
                            $countRevenue = mysqli_fetch_array($sql_revenue)
                            ?>
                            <p class="card-text"><?php echo "$countRevenue[0] VND" ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow border-warning mb-3" style="border-left: .25rem solid #f6c23e;border-radius: 0.36rem">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#f6c23e ">Tổng Số Vé Đã Bán</h5>
                            <?php
                            $sql_countTicket = mysqli_query($conn, "SELECT * FROM `booked`");
                            $countTicket = mysqli_num_rows($sql_countTicket);
                            ?>
                            <p class="card-text"><?php echo "$countTicket Vé" ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow border-success mb-3" style="border-left: .25rem solid #1cc88a;border-radius: 0.36rem">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#1cc88a ">Số Phòng Rạp</h5>
                            <?php
                            $sql_countTheater = mysqli_query($conn, "SELECT * FROM `room`");
                            $countTheater = mysqli_num_rows($sql_countTheater);
                            ?>
                            <p class="card-text"><?php echo "$countTheater rạp" ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow border-info mb-3" style="border-left: .25rem solid #36b9cc;border-radius: 0.36rem">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#36b9cc ">Số Khách Hàng</h5>
                            <?php
                            $sql_countCus = mysqli_query($conn, "SELECT * FROM `customer`");
                            $countCus = mysqli_num_rows($sql_countCus);
                            ?>
                            <p class="card-text"><?php echo "$countCus Người" ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- list user -->
        <div id="user">
            <h3>USER</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Fullname</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM `customer`");
                    while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $fullname = $row['fullname'];
                        $birthday = $row['birthday'];
                        $gender = $row['gender'];
                        $email = $row['email'];
                        $phone = $row['phonenumber'];

                        echo '
                            <tr>
                                <td class="getIDUser">' . $id . '</td>
                                <td>' . $username . '</td>
                                <td>' . $password . '</td>
                                <td>' . $fullname . '</td>
                                <td>' . $birthday . '</td>
                                <td>' . $gender . '</td>
                                <td>' . $email . '</td>
                                <td>' . $phone . '</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-xs delete_user_btn"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- list movies -->
        <div id="movies">
            <h3>MOVIES - NOW PLAYING AND STATISTICAL</h3>
            <a class="add" href="#" id="addPlay_btn">Add movie playing</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Poster</th>
                        <th>Trailer</th>
                        <th>Type</th>
                        <th>Summary</th>
                        <th>Nation</th>
                        <th>During</th>
                        <th>Premiere</th>
                        <th>Actor</th>
                        <th>Director</th>
                        <th>Sold</th>
                        <th>Revenue</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $sql_playing = mysqli_query($conn, "SELECT * FROM `movie`");
                    while ($row = $sql_playing->fetch_array(MYSQLI_ASSOC)) {
                        $id_movie = $row['id_movie'];
                        $movie_name = $row['movie_name'];
                        $poster = $row['poster'];
                        $trailer = $row['trailer'];
                        $type = $row['type'];
                        $summary = $row['summary'];
                        $nation = $row['nation'];
                        $during = $row['during'];
                        $premiere = $row['premiere'];
                        $actor = $row['actor'];
                        $director = $row['director'];
                        $sold = $row['sold'];
                        $revenue = $row['revenue'];

                        echo '
                                <tr>
                                    <td>' . $movie_name . '</td>
                                    <td><img src="./assets/img/poster/playing/' . $poster . '"></td>
                                    <td>' . $trailer . '</td>
                                    <td>' . $type . '</td>
                                    <td>' . $summary . '</td>
                                    <td>' . $nation . '</td>
                                    <td>' . $during . '</td>
                                    <td>' . $premiere . '</td>
                                    <td>' . $actor . '</td>
                                    <td>' . $director . '</td>
                                    <td>' . $sold . '</td>
                                    <td>' . $revenue . '</td>
                                    <td>
                                        <a href="edit_movieP.php?id=' . $id_movie . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_movie . '" class="btn btn-danger btn-xs delete_moviePlay_btn"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            ';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- list upmovies -->
        <div id="upcoming">
            <div id="upmovies">
                <h3>UPCOMING MOVIE</h3>
                <a class="add" href="" id="addUp_btn">Add movie upcoming</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Poster</th>
                            <th>Trailer</th>
                            <th>Type</th>
                            <th>Summary</th>
                            <th>Nation</th>
                            <th>During</th>
                            <th>Premiere</th>
                            <th>Actor</th>
                            <th>Director</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql_upcoming = mysqli_query($conn, "SELECT * FROM `upcoming_movie`");
                        while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
                            $id_up_movie = $row['id_up_movie'];
                            $up_movie_name = $row['up_movie_name'];
                            $poster_up = $row['poster_up'];
                            $trailer_up = $row['trailer_up'];
                            $type_up = $row['type_up'];
                            $summary_up = $row['summary_up'];
                            $nation_up = $row['nation_up'];
                            $during_up = $row['during_up'];
                            $premiere_up = $row['premiere_up'];
                            $actor_up = $row['actor_up'];
                            $director_up = $row['director_up'];

                            echo '
                                    <tr>
                                        <td>' . $up_movie_name . '</td>
                                        <td><img src="./assets/img/poster/upcoming/' . $poster_up . '"></td>
                                        <td>' . $trailer_up . '</td>
                                        <td>' . $type_up . '</td>
                                        <td>' . $summary_up . '</td>
                                        <td>' . $nation_up . '</td>
                                        <td>' . $during_up . '</td>
                                        <td>' . $premiere_up . '</td>
                                        <td>' . $actor_up . '</td>
                                        <td>' . $director_up . '</td>
                                        <td>
                                            <a href="edit_movieU.php?id=' . $id_up_movie . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_up_movie . '" class="btn btn-danger btn-xs delete_movieUp_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- list promotions -->
        <div id="promotion">
            <div id="promotions">
                <h3>PROMOTION</h3>
                <a class="add" href="" id="add_promotion">Add promtion</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Poster</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql_upcoming = mysqli_query($conn, "SELECT * FROM `promotion`");
                        while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
                            $id_promotion = $row['promotion_id'];
                            $promotion_name = $row['promotion_name'];
                            $poster = $row['poster'];
                            $content = $row['content'];

                            echo '
                                    <tr>
                                        <td>' . $promotion_name . '</td>
                                        <td><img src="./assets/img/poster/promotion/' . $poster . '"></td>
                                        <td>' . $content . '</td>
                                        <td>
                                            <a href="edit_promotion.php?id=' . $id_promotion . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_promotion . '" class="btn btn-danger btn-xs delete_promotion_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- list blogs -->
        <div id="blog">
            <div id="blogs">
                <h3>BLOG</h3>
                <a class="add" href="" id="add_blog">Add blog</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Poster</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql_upcoming = mysqli_query($conn, "SELECT * FROM `blog`");
                        while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
                            $id_blog = $row['blog_id'];
                            $blog_name = $row['blog_name'];
                            $poster = $row['poster'];
                            $content = $row['content'];

                            echo '
                                    <tr>
                                        <td>' . $blog_name . '</td>
                                        <td><img src="./assets/img/poster/blog/' . $poster . '"></td>
                                        <td>' . $content . '</td>
                                        <td>
                                            <a href="edit_blog.php?id=' . $id_blog . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_blog . '" class="btn btn-danger btn-xs delete_blog_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- list commentaries -->
        <div id="commentary">
            <div id="commentaries">
                <h3>COMMENTARY</h3>
                <a class="add" href="" id="add_commentary">Add commentary</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Poster</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql_upcoming = mysqli_query($conn, "SELECT * FROM `commentary`");
                        while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
                            $id_commentary = $row['commentary_id'];
                            $commentary_name = $row['commentary_name'];
                            $poster = $row['poster'];
                            $content = $row['content'];

                            echo '
                                    <tr>
                                        <td>' . $commentary_name . '</td>
                                        <td><img src="./assets/img/poster/commentary/' . $poster . '"></td>
                                        <td>' . $content . '</td>
                                        <td>
                                            <a href="edit_commentary.php?id=' . $id_commentary . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_commentary . '" class="btn btn-danger btn-xs delete_commentary_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- list actors -->
        <div id="actor">
            <div id="actors">
                <h3>ACTOR</h3>
                <a class="add" href="" id="add_actor">Add actor</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Poster</th>
                            <th>Content short</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $sql_upcoming = mysqli_query($conn, "SELECT * FROM `actor`");
                        while ($row = $sql_upcoming->fetch_array(MYSQLI_ASSOC)) {
                            $id_actor = $row['actor_id'];
                            $actor_name = $row['actor_name'];
                            $poster = $row['poster'];
                            $content = $row['content'];
                            $content_long = $row['content_long'];

                            echo '
                                    <tr>
                                        <td>' . $actor_name . '</td>
                                        <td><img src="./assets/img/poster/actor/' . $poster . '"></td>
                                        <td>' . $content . '</td>
                                        <td>' . $content_long . '</td>
                                        <td>
                                            <a href="edit_blog.php?id=' . $id_actor . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $id_actor . '" class="btn btn-danger btn-xs delete_blog_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- list screenings -->
        <div id="screenings">
            <h3>SCREENINGS</h3>
            <a class="add" href="" id="add_screenings">Add new screenings</a>
            <?php
            $sql_screenings = mysqli_query($conn, "SELECT * FROM `screenings`");
            $array_room = array();
            while ($row = $sql_screenings->fetch_array(MYSQLI_ASSOC)) {
                $screenings_id = $row['screenings_id'];
                $room_id = $row['room_id'];
                if (!in_array($room_id, $array_room)) {
                    array_push($array_room, $room_id);

                    $room = mysqli_query($conn, "SELECT `room_number` FROM `room` WHERE `room_id` = '$room_id'");
                    $room = $room->fetch_array(MYSQLI_ASSOC)['room_number'];

                    echo '<h4>Room ' . $room . '</h4>
                    <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Day playing</th>
                                        <th>Time playing</th>
                                        <th>Movie</th>
                                        <th>Action</th>
                                        <th>Seat Empty</th>
                                        <th>Seat Selected</th>
                                    </tr>
                                </thead>
                            
                                <tbody>';


                    $room_screenings = mysqli_query($conn, "SELECT * FROM `screenings` WHERE `room_id` = '$room_id'");
                    while ($row = $room_screenings->fetch_array(MYSQLI_ASSOC)) {
                        $id_movie = $row['id_movie'];
                        $day_playing = $row['day_playing'];
                        $time_playing = $row['time_playing'];
                        $seat_empty = $row['seat_empty'];
                        $seat_selected = $row['seat_selected'];

                        $movie = mysqli_query($conn, "SELECT `movie_name` FROM `movie` WHERE `id_movie` = '$id_movie'");
                        $movie = $movie->fetch_array(MYSQLI_ASSOC)['movie_name'];
                        echo'
                                    <tr>
                                        <td>' . $day_playing . '</td>
                                        <td>' . $time_playing . '</td>
                                        <td>' . $movie . '</td>
                                        <td>' . $seat_empty . '</td>
                                        <td>' . $seat_selected . '</td>
                                        <td>
                                            <a href="edit_screenings.php?id=' . $screenings_id . '" class="btn btn-primary btn-xs"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="" id="' . $screenings_id . '" class="btn btn-danger btn-xs delete_screenings_btn"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>';
                    }

                    echo '
                            </tbody>
                        </table>';
                }
            }
            ?>
        </div>
    </div>

    

    <div class="modal fade" id="add-modal-playing" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add movies content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm phim đang chiếu</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <h4>Tên phim:</h4>
                        <input type="text" class="input-field" name="p-name" value="" placeholder="" required>
                        <h4>Poster phim:</h4>
                        <input type="file" name="p-poster" id="fileToUpload" required>
                        <h4>Trailer:</h4>
                        <input type="text" class="input-field" name="p-trailer" value="" placeholder="" required>
                        <h4>Thể loại:</h4>
                        <input type="text" class="input-field" name="p-type" value="" placeholder="" required>
                        <h4>Mô tả:</h4>
                        <textarea class="form-control" name="p-des" placeholder="" rows="4" required></textarea>
                        <h4>Quốc gia:</h4>
                        <input type="text" class="input-field" name="p-nation" value="" placeholder="" required>
                        <h4>Thời lượng:</h4>
                        <input type="text" class="input-field" name="p-during" value="" placeholder="" required>
                        <h4>Khởi chiếu:</h4>
                        <input type="text" class="input-field" name="p-pre" value="" placeholder="" required>
                        <h4>Diễn viên:</h4>
                        <input type="text" class="input-field" name="p-actor" value="" placeholder="" required>
                        <h4>Đaọ diễn:</h4>
                        <input type="text" class="input-field" name="p-director" value="" placeholder="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_play" value="add_play">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal-upcoming" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add movies content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm phim sắp chiếu</h4>
                </div>
                <form action="manager_script.php" method="post">
                    <div class="modal-body">
                        <h4>Tên phim:</h4>
                        <input type="text" class="input-field" name="u-name" value="" placeholder="" required>
                        <h4>Poster phim:</h4>
                        <input type="file" name="u-poster" id="fileToUpload" required>
                        <h4>Trailer:</h4>
                        <input type="text" class="input-field" name="u-trailer" value="" placeholder="" required>
                        <h4>Thể loại:</h4>
                        <input type="text" class="input-field" name="u-type" value="" placeholder="" required>
                        <h4>Mô tả:</h4>
                        <textarea class="form-control" name="u-des" placeholder="" rows="4" required></textarea>
                        <h4>Quốc gia:</h4>
                        <input type="text" class="input-field" name="u-nation" value="" placeholder="" required>
                        <h4>Thời lượng:</h4>
                        <input type="text" class="input-field" name="u-during" value="" placeholder="" required>
                        <h4>Khởi chiếu:</h4>
                        <input type="text" class="input-field" name="u-pre" value="" placeholder="" required>
                        <h4>Diễn viên:</h4>
                        <input type="text" class="input-field" name="u-actor" value="" placeholder="" required>
                        <h4>Đaọ diễn:</h4>
                        <input type="text" class="input-field" name="u-director" value="" placeholder="" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_up" value="add_up">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal-promotion" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add promotion content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm khuyến mãi</h4>
                </div>
                <form action="manager_script.php" method="post">
                    <div class="modal-body">
                        <h4>Tên khuyến mãi:</h4>
                        <input type="text" class="input-field" name="u-name" value="" placeholder="" required>
                        <h4>Poster:</h4>
                        <input type="file" name="u-poster" id="fileToUpload" required>
                        <h4>Nội dung:</h4>
                        <textarea class="form-control" name="u-des" placeholder="" rows="4" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_promotion"
                            value="add_promotion">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal-blog" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add blog content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm blog</h4>
                </div>
                <form action="manager_script.php" method="post">
                    <div class="modal-body">
                        <h4>Tên Blog:</h4>
                        <input type="text" class="input-field" name="u-name" value="" placeholder="" required>
                        <h4>Poster:</h4>
                        <input type="file" name="u-poster" id="fileToUpload" required>
                        <h4>Nội dung:</h4>
                        <textarea class="form-control" name="u-des" placeholder="" rows="4" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_blog"
                            value="add_blog">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal-commentary" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add commentary content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm commentary</h4>
                </div>
                <form action="manager_script.php" method="post">
                    <div class="modal-body">
                        <h4>Tên commentary:</h4>
                        <input type="text" class="input-field" name="u-name" value="" placeholder="" required>
                        <h4>Poster:</h4>
                        <input type="file" name="u-poster" id="fileToUpload" required>
                        <h4>Nội dung:</h4>
                        <textarea class="form-control" name="u-des" placeholder="" rows="4" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_commentary"
                            value="add_commentary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal-screenings" role="dialog">
        <div class="modal-dialog">
            <!-- Modal add screenings content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm Screenings</h4>
                </div>
                <form action="manager_script.php" method="post">
                    <div class="modal-body">
                        <h4>Room ID:</h4>
                        <input type="text" class="input-field" name="p-room" value="" placeholder="" required>
                        <h4>ID Movie:</h4>
                        <input type="text" name="p-movie" required>
                        <h4>Day Playing:</h4>
                        <input type="date" class="input-field" name="p-dplaying" value="" placeholder="" required>
                        <h4>Time Playing:</h4>
                        <input type="time" class="input-field" name="p-tplaying" value="" placeholder="" required>
                        <h4>Seat Empty:</h4>
                        <textarea class="form-control" name="p-seat-empty" placeholder="" rows="4" required></textarea>
                        <h4>Seat Selected:</h4>
                        <input type="text" class="input-field" name="p-seat-selected" value="" placeholder="" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="add_screenings" value="add_screenings">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirm Modal -->
    <div id="delete-user" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal user content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa tài khoản</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="delete_id">
                        <h5>Bạn có chắc chắn muốn xóa tài khoản này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_user" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-movieP" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal movie now playing content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa phim đang chiếu</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_movieP" id="delete_id_movieP">
                        <h5>Bạn có chắc chắn muốn xóa phim đang chiếu này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_movieP" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-movieU" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal movie upcoming content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa phim sắp chiếu</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_movieU" id="delete_id_movieU">
                        <h5>Bạn có chắc chắn muốn xóa phim này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_movieU" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-promotion" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal promotion content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa khuyến mãi</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_promotion" id="delete_id_promotion">
                        <h5>Bạn có chắc chắn muốn xóa khuyến mãi này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_promotion" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-blog" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal blog content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa Blog</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_blog" id="delete_id_blog">
                        <h5>Bạn có chắc chắn muốn xóa Blog này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_blog" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete-commentary" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal commentary content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa commentary</h4>
                </div>
                <form action="manager_script.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_commentary" id="delete_id_commentary">
                        <h5>Bạn có chắc chắn muốn xóa commentary này?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="delete_commentary" value="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#addPlay_btn').click(function (e) {
                e.preventDefault();
                $('#add-modal-playing').modal('show');

            });

            $('#addUp_btn').click(function (e) {
                e.preventDefault();
                $('#add-modal-upcoming').modal('show');

            });

            $('#add_promotion').click(function (e) {
                e.preventDefault();
                $('#add-modal-promotion').modal('show');

            });

            $('#add_blog').click(function (e) {
                e.preventDefault();
                $('#add-modal-blog').modal('show');

            });

            $('#add_commentary').click(function (e) {
                e.preventDefault();
                $('#add-modal-commentary').modal('show');

            });

            $('#add_screenings').click(function (e) {
                e.preventDefault();
                $('#add-modal-screenings').modal('show');

            });


            $('.delete_user_btn').click(function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('.getIDUser').text();

                $('#delete_id').val(id);
                $('#delete-user').modal('show');

            });

            $('.delete_moviePlay_btn').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $('#delete_id_movieP').val(id);
                $('#delete-movieP').modal('show');

            });

            $('.delete_movieUp_btn').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $('#delete_id_movieU').val(id);
                $('#delete-movieU').modal('show');

            });

            $('.delete_promotion_btn').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $('#delete_id_promotion').val(id);
                $('#delete-promotion').modal('show');

            });

            $('.delete_blog_btn').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $('#delete_id_blog').val(id);
                $('#delete-blog').modal('show');

            });

            $('.delete_commentary_btn').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                $('#delete_id_commentary').val(id);
                $('#delete-commentary').modal('show');

            });

            $('#add_screenings').click(function (e) {
                e.preventDefault();
                $('#add-modal-screenings').modal('show');

            });

            $('.update_moviePlay_btn').click(function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('.getIDUMovie').text();

                $('#delete_id_movieU').val(id);
                $('#delete-movieU').modal('show');

            });
        });
    </script>

</body>

</html>