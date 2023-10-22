<?php
include('menu.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">

    <thead>
        <tr>
    <th>ID</th>
    <th>Tên sản phầm</th>
    <th>Hình ảnh</th>
    <th>Giá</th>
    <th>ID Danh mục</th>
    <th>Xóa</th>
    <th>Sửa</th>
    </tr>
    </thead>
    <?php
$iddanhmuc = $_GET['id'];
$connect = mysqli_connect("localhost", "root", "", "login");
$sta = ("SELEct * FROM sanpham WHERE iddanhmuc = $iddanhmuc");
$kq = mysqli_query($connect, $sta);
while($row = mysqli_fetch_array($kq))
{

?>

    <tbody>
    <tr>
    <td><?php echo $row['id'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img width="30" height="40" src="./img/<?php echo $row['hinhanh'] ?>"></td>
    <td><?php echo $row['gia'] ?></td>
    <td><?php echo $row['iddanhmuc'] ?></td>
    <td> <a href="xoaa.php?id=<?php echo $row['id'] ?>" >xóa</a> </td>
    <td> <a href="sua.php?id=<?php echo $row['id'] ?>" >sửa</a> </td>
    <td><a href="addcart.php?id=<?php echo $row['id'] ?>">Thêm vào giỏi hàng</a></td>

    </tr>
    </tbody>
    <?php
}
?>   
</table>

</body>
</html>