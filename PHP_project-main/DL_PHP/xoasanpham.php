<?php
require("ketNoiDatabase.php");
$id = (int) $_GET['id'];

$image = "SELECT imgURL FROM sanpham WHERE masp = $id";
$query = mysqli_query($conn, $image);
$after = mysqli_fetch_assoc($query);

if (file_exists("./images/" . $after['imgURL'])) {
    unlink("./images/" . $after['imgURL']);
}

$sql = "DELETE FROM sanpham WHERE masp = $id";
mysqli_query($conn, $sql);

header("Location: trangChu.php");
?>
