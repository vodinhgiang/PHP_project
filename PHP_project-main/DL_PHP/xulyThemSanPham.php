<?php
require("ketnoiDatabase.php");

if (isset($_POST["submit"])) {
    $tensp = $_POST["ten"];
    $gia = $_POST["gia"];
    $mota = $_POST["mota"];
    $hinhanh = $_FILES['hinhanh']['name'];

    
    $target_dir = "./images/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }

    
    $target_file = $target_dir . basename($hinhanh);

    
    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
        
        $sql = "INSERT INTO sanpham (masp, tensp, gia, mota, imgURL)
                VALUES (NULL, '$tensp', '$gia', '$mota', '$hinhanh')";

        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Bạn đã thêm thành công');</script>";
            header("Location: trangchu.php");
        } else {
            echo "<script>alert('Lỗi khi thêm sản phẩm');</script>";
        }
    } else {
        echo "<script>alert('Lỗi khi tải lên hình ảnh');</script>";
    }
}
?>
