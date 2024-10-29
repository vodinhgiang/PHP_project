<?php
require("ketNoiDatabase.php");

if (isset($_GET['id']) && isset($_POST['submit'])) {
    $masp = (int)$_GET['id'];
    $tensp = $_POST['ten'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "./images/";
    $target_file = $target_dir . basename($hinhanh);

  
    $sql = "SELECT * FROM sanpham WHERE masp = '$masp'";
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $oldImage = $row['imgURL'];
    } else {
        echo "Sản phẩm không tồn tại.";
        exit;
    }

    
    if ($hinhanh) {
        
        if (file_exists($target_dir . $oldImage)) {
            unlink($target_dir . $oldImage);
        }

       
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file);
    } else {
        
        $hinhanh = $oldImage;
    }

    
    $sql = "UPDATE sanpham SET tensp = '$tensp', gia = '$gia', mota = '$mota', imgURL = '$hinhanh' WHERE masp = '$masp'";
    if (mysqli_query($conn, $sql)) {
        header("Location: trangChu.php");
    } else {
        echo "Lỗi cập nhật sản phẩm: " . mysqli_error($conn);
    }
} else {
    echo "ID hoặc dữ liệu không hợp lệ.";
}
?>
