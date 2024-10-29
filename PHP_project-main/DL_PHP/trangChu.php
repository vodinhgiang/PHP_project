<?php
require("ketNoiDatabase.php");
$sql = "SELECT * FROM sanpham";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Danh Sách Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        #productList {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        #productList td, #productList th {
            border: 1px solid #ddd;
            padding: 12px;
        }
        #productList tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #productList tr:hover {
            background-color: #ddd;
        }
        #productList th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        img {
            width: 150px;
            height: auto;
        }
        a {
            text-decoration: none;
            color: darkblue;
        }
        a:hover {
            color: darkred;
        }
        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #2F54EB;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-btn:hover {
            background-color: #1e3aa7;
        }
    </style>
    <script>
        function xoasanpham() {
            var conf = confirm('Bạn có chắc chắn xóa sản phẩm này không?');
            return conf;
        }
    </script>
</head>
<body>
    <h1>Quản Lý Danh Sách Sản Phẩm</h1>
    <a href="themsanpham.php" class="add-btn">Thêm Sản Phẩm</a>
    <table id="productList">
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Hành Động</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
        <tr>
            <td><?= htmlspecialchars($row['masp']) ?></td>
            <td><?= htmlspecialchars($row['tensp']) ?></td>
            <td><?= number_format($row['gia']) ?> VND</td>
            <td><img src="./images/<?= htmlspecialchars($row['imgURL']) ?>" alt="Product Image"></td>
            <td>
                <a href='suaSanPham.php?id=<?= $row['masp'] ?>'>Sửa</a> | 
                <a onclick="return xoasanpham()" href='xoaSanPham.php?id=<?= $row['masp'] ?>'>Xóa</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
