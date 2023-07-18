<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

    if(!isset($_SESSION["manager"])){
        header("location:login.php");
    }

    $url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str($parts['query'],$query);
    $id = $query['id'];

    $sql = mysqli_query($conn,"SELECT * FROM `movie` WHERE `id_movie` = '$id'");
    while($row = $sql->fetch_array(MYSQLI_ASSOC)){
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
    }

    if(isset($_POST['update'])){
        $movie_name = $_POST['movie_name'];
        $poster = $_FILES['poster']['name'];
        $trailer = $_POST['trailer'];
        $type = $_POST['type'];
        $summary = $_POST['summary'];
        $nation = $_POST['nation'];
        $during = $_POST['during'];
        $premiere = $_POST['premiere'];
        $actor = $_POST['actor'];
        $director = $_POST['director'];

        $sql_edit = "UPDATE `movie` SET `movie_name`='$movie_name', `poster`='$poster', `trailer`='$trailer', `type` = '$type', `summary` = '$summary', `nation` = '$nation', `during` = '$during', `premiere` = '$premiere', `actor` = '$actor', `director` = '$director' WHERE `id_movie` = '$id'";
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
    <h2>Sửa thông tin phim đang chiếu</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pwd">Tên phim:</label>
            <input type="text" class="form-control" value="<?php echo $movie_name; ?>" name="movie_name" required>
        </div>
        <div class="form-group">
            <label for="pwd">Poster:</label>
            <input type="file" class="form-control" value="<?php echo $poster; ?>" name="poster" required>
        </div>
        <div class="form-group">
            <label for="pwd">Trailer:</label>
            <div>
                <input type="text" class="form-control" name="trailer" value="<?php echo $trailer; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Thể loại:</label>
            <input type="text" class="form-control" value="<?php echo $type; ?>" name="type" >
        </div>
        <div class="form-group">
            <label for="pwd">Mô tả:</label>
            <textarea class="form-control" value="" name="summary"><?php echo $summary; ?></textarea>
        </div>
        <div class="form-group">
            <label for="pwd">Quốc gia:</label>
            <input type="text" class="form-control" value="<?php echo $nation; ?>" name="nation" >
        </div>
        <div class="form-group">
            <label for="pwd">Thời lượng:</label>
            <input type="text" class="form-control" value="<?php echo $during; ?>" name="during" >
        </div>
        <div class="form-group">
            <label for="pwd">Khởi chiếu:</label>
            <input type="text" class="form-control" value="<?php echo $premiere; ?>" name="premiere" >
        </div>
        <div class="form-group">
            <label for="pwd">Diễn viên:</label>
            <input type="text" class="form-control" value="<?php echo $actor; ?>" name="actor" >
        </div>
        <div class="form-group">
            <label for="pwd">Đạo diễn:</label>
            <input type="text" class="form-control" value="<?php echo $director; ?>" name="director" >
        </div>
        <button type="submit" style="background-color: #4CAF50; border: 1px solid #4CAF50" class="btn btn-primary" name="update" value="update" id="update">Update</button>
        <button type="reset" class="btn btn-default" name="reset">Reset</button>
    </form>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#add').click(function(){
            alert("Thêm phim đang chiếu thành công!");
        })
    });
</script>
</html>