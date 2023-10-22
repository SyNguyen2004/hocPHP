<?php
session_start();
include('connect.php');
if(isset($_SESSION['mySession'])){
    if(isset($_GET['id'])){
    $id_this = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE id =$id_this";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
}
 if(isset($_POST['btn'])){
        $id = $_POST['id'];
        $user = $_POST['name'];
        $img = basename($_FILES["hinhanh"]["name"]);
        $price = $_POST['gia'];
        $iddanhmuc = $_POST['iddanhmuc'];
        $sql1 = "UPDATE sanpham SET id ='$id', tensanpham='$user',hinhanh='$img',gia='$price',iddanhmuc='$iddanhmuc' WHERE id=$id";
        $result1 = mysqli_query($conn, $sql1);
        echo $result1;
        header('location:home.php');
    }
}else{
    header('location:login.php');
}
?>

<form action="sua.php" method="POST" enctype="multipart/form-data" >
<label for="">ID</label>
<input type="number" name="id" value="<?php echo $row['id'] ?>">
<br>
<label for="">Tên sản phẩm</label>
<input type="text" name="name" value="<?php echo $row['tensanpham']?>">
<br>
<label for="">Hình ảnh</label>
<img width="40" height="30" src="./img/<?php echo $row['hinhanh']?>" alt="">
<br>
<input type="file" name="hinhanh">
<br>
<label for="">Giá</label>
<input type="number" name="gia" value="<?php echo $row['gia']?>">
<br>
<label for="">ID Danh mục</label>
<input type="number" name="iddanhmuc" value="<?php echo $row['iddanhmuc']?>">
<br>
<button type="submit" name="btn">Sửa sản phẩm</button>
</form>