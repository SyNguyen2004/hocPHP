<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
<?php
session_start();
include('connect.php');
include('menu.php');

if(isset($_SESSION['mySession'])){
    if(isset($_POST['btn'])){
        $user = $_POST['name'];
        $img = basename($_FILES["hinhanh"]["name"]);
        $price = $_POST['gia'];
        $iddanhmuc = $_POST['iddanhmuc'];

    $sql = "INSERT INTO sanpham (tensanpham, hinhanh, gia, iddanhmuc) 
    VALUES ('$user','$img','$price','$iddanhmuc')";
    $result = mysqli_query($conn, $sql);
    header('location:home.php');
}
}else{
    header('location:login.php');
}

?>
<form action="them.php" method="POST" enctype="multipart/form-data">
<label for="">Tên sản phẩm</label>
<input type="text" name="name">
<br>
<label for="">Hình ảnh</label>
<input type="file" name="hinhanh"> 
<br>
<label for="">Giá</label>
<input type="number" name="gia">
<br>
<label for="">ID Danh mục</label>
<input type="number" name="iddanhmuc">
<br>
<input type="submit" value="Thêm sản phẩm" name="btn">
</form>
</body>
</html>