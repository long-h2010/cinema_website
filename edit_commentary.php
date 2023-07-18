<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/demo2/connect.php');

if (!isset($_SESSION["manager"])) {
    header("location:login.php");
}

$url = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];

$sql = mysqli_query($conn, "SELECT * FROM `commentary` WHERE `commentary_id` = '$id'");
while ($row = $sql->fetch_array(MYSQLI_ASSOC)) {
    $commentary_name = $row['commentary_name'];
    $poster = $row['poster'];
    $content = $row['content'];
}

if (isset($_POST['update'])) {
    $commentary_name = $_POST['commentary_name'];
    $poster = $_FILES['poster']['name'];
    $content = $_POST['content'];

    $sql_edit = "UPDATE `commentary` SET `commentary_name`='$commentary_name',`poster`='$poster',`content`='$content' WHERE `commentary_id`='$id'";
    mysqli_query($conn, $sql_edit);
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
        body {
            padding-top: 50px;
            background-image: linear-gradient(to right, #3d0b13, #1E181F);
            color: white;
        }

        table {

            text-align: center;
        }

        tr.item {
            border-top: 1px solid #5e5e5e;
            border-bottom: 1px solid #5e5e5e;
        }

        tr.item:hover {
            background-color: #d9edf7;
        }

        tr.item td {
            min-width: 150px;
        }

        tr.header {
            font-weight: bold;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: deeppink;
            font-weight: bold;
        }
    </style>


    <div class="container" style="width: 600px">
        <h2>Sửa thông tin commentary</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pwd">Tên commentary:</label>
                <input type="text" class="form-control" value="<?php echo $commentary_name; ?>" name="commentary_name"
                    required>
            </div>
            <div class="form-group">
                <label for="pwd">Poster:</label>
                <input type="file" class="form-control" value="<?php echo $poster; ?>" name="poster" required>
            </div>
            <div class="form-group">
                <label for="pwd">Nội dung:</label>
                <textarea class="form-control" value="" name="content"><?php echo $content; ?></textarea>
            </div>
            <button type="submit" style="background-color: #4CAF50; border: 1px solid #4CAF50" class="btn btn-primary"
                name="update" value="update" id="update">Update</button>
            <button type="reset" class="btn btn-default" name="reset">Reset</button>
        </form>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#add').click(function () {
            alert("Thêm commentary thành công!");
        })
    });
</script>

</html>