<?php
require("ketNoiDatabase.php");
if (isset($_GET['id'])) {
    $masp = (int)$_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE masp = '$masp'";
    $query = mysqli_query($conn, $sql);
    
    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $img = $row['imgURL'];
    } else {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
} else {
    echo "ID không hợp lệ.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sản Phẩm</title>
    <style>
        form {
            width: 600px;
            margin: 0 auto; 
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 24px;
        }
        div {
            display: flex;
            margin-bottom: 20px;
            align-items: center; 
        }
        label {
            width: 120px;
            font-weight: bold;
        }
        input, textarea {
            flex: 1;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-left: 120px; 
            padding: 8px 16px;
            color: #2F1C25;
            background-color: transparent;
            border: 2px solid #D7B0DF;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #D7B0DF;
            color: white;
        }
        a {
            display: block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #4A90E2;
        }
    </style>
</head>
<body>
    <a href="trangchu.php">Quay về</a>
    <h1>Cập nhật sản phẩm</h1>
    <form action="xulySuaSanPham.php?id=<?= $masp ?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="ten">Tên sản phẩm</label>
            <input type="text" id="ten" name="ten" value="<?= htmlspecialchars($row['tensp']) ?>" required>
        </div>
        <div>
            <label for="gia">Giá sản phẩm</label>
            <input type="number" id="gia" name="gia" value="<?= htmlspecialchars($row['gia']) ?>" required>
        </div>
        <div>
            <label for="file">Hình ảnh</label>
            <img style="width: 200px; height: 200px;" src="./images/<?= htmlspecialchars($img) ?>" alt="Product Image"><br>
            <input type="file" id="file" name="hinhanh">
        </div>
        <div>
            <label for="mota">Mô tả</label>
            <textarea name="mota" id="mota" cols="30" rows="4" required><?= htmlspecialchars($row['mota']) ?></textarea>
        </div>
        <button type="submit" name="submit">Cập nhật sản phẩm</button>
    </form>
</body>
</html>
