<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/demo2/connect.php');

function createId($last_id)
{
    $char = '';
    for ($i = 0; $i < strlen($last_id); $i++) {
        if (!is_numeric($last_id[$i])) {
            $char = $char . $last_id[$i];
        }
    }

    $num_id = (int) substr($last_id, strlen($char)) + 1;

    $zero = '';
    for ($i = 0; $i < strlen($last_id) - strlen($char) - strlen($num_id); $i++) {
        $zero = $zero . "0";
    }

    return $char . $zero . $num_id;
}

if (isset($_POST['add_play'])) {
    $name = $_POST['p-name'];
    $poster = $_POST['p-poster'];
    $trailer = $_POST['p-trailer'];
    $type = $_POST['p-type'];
    $des = $_POST['p-des'];
    $nation = $_POST['p-nation'];
    $during = $_POST['p-during'];
    $premiere = $_POST['p-pre'];
    $actor = $_POST['p-actor'];
    $director = $_POST['p-director'];

    $check = mysqli_query($conn, "SELECT * FROM `movie`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `movie` ORDER BY `id_movie` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["id_movie"];
        }
        $id = createId($last);
    } else {
        $id = createId("MV0000");
    }

    $sold = 0;
    $revenue = 0;

    $sql_playing = "INSERT INTO `movie` VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $conn->prepare($sql_playing);
    $stm->bind_param("sssssssssssii", $id, $name, $poster, $trailer, $type, $des, $nation, $during, $premiere, $actor, $director, $sold, $revenue);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#movies");
    }

} else if (isset($_POST['add_up'])) {
    $name = $_POST['u-name'];
    $poster = $_POST['u-poster'];
    $trailer = $_POST['u-trailer'];
    $type = $_POST['u-type'];
    $des = $_POST['u-des'];
    $nation = $_POST['u-nation'];
    $during = $_POST['u-during'];
    $premiere = $_POST['u-pre'];
    $actor = $_POST['u-actor'];
    $director = $_POST['u-director'];

    $check = mysqli_query($conn, "SELECT * FROM `upcoming_movie`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `upcoming_movie` ORDER BY `id_up_movie` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["id_up_movie"];
        }

        $id = createId($last);
    } else {
        $id = createId("MVU0000");
    }

    $sql_upcoming = "INSERT INTO `upcoming_movie` VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $conn->prepare($sql_upcoming);
    $stm->bind_param("sssssssssss", $id, $name, $poster, $trailer, $type, $des, $nation, $during, $premiere, $actor, $director);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#upcoming");
    }

} else if (isset($_POST['add_promotion'])) {
    $name = $_POST['u-name'];
    $poster = $_POST['u-poster'];
    $des = $_POST['u-des'];

    $check = mysqli_query($conn, "SELECT * FROM `promotion`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `promotion` ORDER BY `promotion_id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["promotion_id"];
        }

        $id = createId($last);
    } else {
        $id = createId("KM000");
    }

    $sql_promotion = "INSERT INTO `promotion` VALUES(?,?,?,?)";
    $stm = $conn->prepare($sql_promotion);
    $stm->bind_param("ssss", $id, $name, $poster, $des);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#promotion");
    }

} else if (isset($_POST['add_blog'])) {
    $name = $_POST['u-name'];
    $poster = $_POST['u-poster'];
    $des = $_POST['u-des'];

    $check = mysqli_query($conn, "SELECT * FROM `blog`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `blog` ORDER BY `blog_id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["blog_id"];
        }

        $id = createId($last);
    } else {
        $id = createId("BG000");
    }

    $sql_blog = "INSERT INTO `blog` VALUES(?,?,?,?)";
    $stm = $conn->prepare($sql_blog);
    $stm->bind_param("ssss", $id, $name, $poster, $des);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#blog");
    }
}
else if (isset($_POST['add_actor'])) {
    $name = $_POST['u-name'];
    $poster = $_POST['u-poster'];
    $des = $_POST['u-des'];

    $check = mysqli_query($conn, "SELECT * FROM `actor`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `actor` ORDER BY `actor_id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["actor_id"];
        }

        $id = createId($last);
    } else {
        $id = createId("AC000");
    }

    $sql_actor = "INSERT INTO `actor` VALUES(?,?,?,?,?)";
    $stm = $conn->prepare($sql_actor);
    $stm->bind_param("ssss", $id, $name, $poster, $des);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#actor");
    }

} else if (isset($_POST['add_commentary'])) {
    $name = $_POST['u-name'];
    $poster = $_POST['u-poster'];
    $des = $_POST['u-des'];

    $check = mysqli_query($conn, "SELECT * FROM `commentary`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `commentary` ORDER BY `commentary_id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["commentary_id"];
        }

        $id = createId($last);
    } else {
        $id = createId("CM000");
    }

    $sql_commentary = "INSERT INTO `commentary` VALUES(?,?,?,?)";
    $stm = $conn->prepare($sql_commentary);
    $stm->bind_param("ssss", $id, $name, $poster, $des);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#commentary");
    }

} else if (isset($_POST['add_screenings'])) {
    $room = $_POST['p-room'];
    $movie = $_POST['p-movie'];
    $dplaying = $_POST['p-dplaying'];
    $tplaying = $_POST['p-tplaying'];
    $empty = $_POST['p-seat-empty'];
    $selected = $_POST['p-seat-selected'];

    $check = mysqli_query($conn, "SELECT * FROM `screenings`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `screenings` ORDER BY `screenings_id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["screenings_id"];
        }

        $id = createId($last);
    } else {
        $id = createId("SC0000");
    }

    $sql_screenings = "INSERT INTO `screenings` VALUES(?,?,?,?,?,?)";
    $stm = $conn->prepare($sql_screenings);
    $stm->bind_param("ssssss", $room, $movie, $dplaying, $tplaying, $empty, $selected);
    if (!$stm->execute()) {
        die($stm->error);
    } else {
        header("Location: manager.php#screenings");
    }
    
} else if (isset($_POST['delete_user'])) {
    $id_user = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM `customer` WHERE `id` = '$id_user'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }

} else if (isset($_POST['delete_movieP'])) {
    $id_movieP = $_POST['id_movieP'];
    $sql = mysqli_query($conn, "DELETE FROM `movie` WHERE `id_movie` = '$id_movieP'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }

} else if (isset($_POST['delete_movieU'])) {
    $id_movieU = $_POST['id_movieU'];
    $sql = mysqli_query($conn, "DELETE FROM `upcoming_movie` WHERE `id_up_movie` = '$id_movieU'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }

} else if (isset($_POST['delete_promotion'])) {
    $id_promotion = $_POST['id_promotion'];
    $sql = mysqli_query($conn, "DELETE FROM `promotion` WHERE `promotion_id` = '$id_promotion'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }

} else if (isset($_POST['delete_blog'])) {
    $id_blog = $_POST['id_blog'];
    $sql = mysqli_query($conn, "DELETE FROM `blog` WHERE `blog_id` = '$id_blog'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }

} else if (isset($_POST['delete_commentary'])) {
    $id_commentary = $_POST['id_commentary'];
    $sql = mysqli_query($conn, "DELETE FROM `commentary` WHERE `commentary_id` = '$id_commentary'");

    if ($sql) {
        header("Location: manager.php");
    } else {
        echo "Something went wrong";
    }
}
?>