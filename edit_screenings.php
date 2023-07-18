<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']. '/demo2/connect.php');

    if(!isset($_SESSION["manager"])){
        header("location:login.php");
    }

    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str($parts['query'],$query);
    $id = $query['id'];

    $sql = mysqli_query($conn,"SELECT * FROM `screenings` WHERE `screenings_id` = '$id'");
    while($row = $sql->fetch_array(MYSQLI_ASSOC)){
        // $screenings_id = $row['screenings_id'];
        $room_id = $row['room_id'];
        $id_movie = $row['id_movie'];
        $day_playing = $row['day_playing'];
        $time_playing = $row['time_playing'];
        $seat_empty = $row['seat_empty'];
        $seat_selected = $row['seat_selected'];
    }

    if(isset($_POST['update'])){
        // $screenings_id = $_POST['screenings_id'];
        $room_id = $_POST['room_id'];
        $id_movie = $_POST['id_movie'];
        $day_playing = $_POST['day_playing'];
        $time_playing = $_POST['time_playing'];
        $seat_empty = $_POST['seat_empty'];
        $seat_selected = $_POST['seat_selected'];

        $sql_edit = "UPDATE `screenings` SET `room_id`='$room_id', `id_movie`='$id_movie', `day_playing`='$day_playing', `time_playing` = '$time_playing', `seat_empty` = '$seat_empty', `seat_selected` = '$seat_selected' WHERE `screenings_id` = '$id'";
        mysqli_query($conn,$sql_edit);
        header("Location: manager.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    body{
        padding-top: 50px;
        background-image: linear-gradient(to right, #3d0b13, #1E181F);
        color: white;
    }
    table{

        text-align: center;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>

<div class="container" style="width: 600px">
    <h2>Sửa thông tin Screenings</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pwd">Room ID:</label>
            <input type="text" class="form-control" value="<?php echo $room_id; ?>" name="room_id" required>
        </div>
        <div class="form-group">
            <label for="pwd">ID Movie:</label>
            <input type="text" class="form-control" value="<?php echo $id_movie; ?>" name="id_movie" required>
        </div>
        <div class="form-group">
            <label for="pwd">Day Playing:</label>
            <div>
                <input type="date" class="form-control" value="<?php echo $day_playing; ?>" name="day_playing" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Time Playing:</label>
            <input type="time" class="form-control" value="<?php echo $time_playing; ?>" name="time_playing" >
        </div>
        <div class="form-group">
            <label for="pwd">Seat Empty:</label>
            <textarea class="form-control" value="" name="seat_empty"><?php echo $seat_empty; ?></textarea>
        </div>
        <div class="form-group">
            <label for="pwd">Seat Selected:</label>
            <input type="text" class="form-control" value="<?php echo $seat_selected; ?>" name="seat_selected" >
        </div>
        <button type="submit" style="background-color: #4CAF50; border: 1px solid #4CAF50" class="btn btn-primary" name="update" value="update" id="update">Update</button>
        <button type="reset" class="btn btn-default" name="reset">Reset</button>
    </form>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#add').click(function(){
            alert("Thêm screenings thành công!");
        })
    });
</script>
</html>