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

    $sql = mysqli_query($conn,"SELECT * FROM `upcoming_movie` WHERE `id_up_movie` = '$id'");
    while($row = $sql->fetch_array(MYSQLI_ASSOC)){
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
    }

    if(isset($_POST['update'])){
        $up_movie_name = $_POST['up_movie_name'];
        $poster_up = $_FILES['poster_up']['name'];
        $trailer_up = $_POST['trailer_up'];
        $type_up = $_POST['type_up'];
        $summary_up = $_POST['summary_up'];
        $nation_up = $_POST['nation_up'];
        $during_up = $_POST['during_up'];
        $premiere_up = $_POST['premiere_up'];
        $actor_up = $_POST['actor_up'];
        $director_up = $_POST['director_up'];

        $sql_edit = "UPDATE `upcoming_movie` SET `up_movie_name`='$up_movie_name', `poster_up`='$poster_up', `trailer_up`='$trailer_up', `type_up` = '$type_up', `summary_up` = '$summary_up', `nation_up` = '$nation_up', `during_up` = '$during_up', `premiere_up` = '$premiere_up', `actor_up` = '$actor_up', `director_up` = '$director_up' WHERE `id_up_movie` = '$id'";
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
    <h2>Sửa thông tin phim sắp chiếu</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pwd">Tên phim:</label>
            <input type="text" class="form-control" value="<?php echo $up_movie_name; ?>" name="up_movie_name" required>
        </div>
        <div class="form-group">
            <label for="pwd">Poster:</label>
            <input type="file" class="form-control" value="<?php echo $poster_up; ?>" name="poster_up" required>
        </div>
        <div class="form-group">
            <label for="pwd">Trailer:</label>
            <div>
                <input type="text" class="form-control" name="trailer_up" value="<?php echo $trailer_up; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Thể loại:</label>
            <input type="text" class="form-control" value="<?php echo $type_up; ?>" name="type_up" >
        </div>
        <div class="form-group">
            <label for="pwd">Mô tả:</label>
            <textarea class="form-control" id="des" name="summary_up"><?php echo $summary_up; ?></textarea>
        </div>
        <div class="form-group">
            <label for="pwd">Quốc gia:</label>
            <input type="text" class="form-control" value="<?php echo $nation_up; ?>" name="nation_up" >
        </div>
        <div class="form-group">
            <label for="pwd">Thời lượng:</label>
            <input type="text" class="form-control" value="<?php echo $during_up; ?>" name="during_up" >
        </div>
        <div class="form-group">
            <label for="pwd">Khởi chiếu:</label>
            <input type="text" class="form-control" value="<?php echo $premiere_up; ?>" name="premiere_up" >
        </div>
        <div class="form-group">
            <label for="pwd">Diễn viên:</label>
            <input type="text" class="form-control" value="<?php echo $actor_up; ?>" name="actor_up" >
        </div>
        <div class="form-group">
            <label for="pwd">Đạo diễn:</label>
            <input type="text" class="form-control" value="<?php echo $director_up; ?>" name="director_up" >
        </div>
        <button type="submit" style="background-color: #4CAF50; border: 1px solid #4CAF50" class="btn btn-primary" name="update" value="update" id="update">Update</button>
        <button type="reset" class="btn btn-default" name="reset">Reset</button>
    </form>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#add').click(function(){
            alert("Thêm phim sắp chiếu thành công!");
        })
    });
</script>
</html>