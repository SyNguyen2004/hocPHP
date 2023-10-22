<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .danhmuc{
            width: 1000px;
            background-color: black;
            height: 40px;
        }
        .danhmuc__link{
            color: #fff;
            text-decoration: none;
            line-height: 40px;
            margin-left: 30px;
            font-size: 20px;
        }
        .header{
            width: 1000px;
            background-color: coral;
        
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin-left: 20px;">CỬA HÀNG ĐIỆN TỬ TRỰC TUYẾN</h1>
    </div>
  <div class="danhmuc">

<?php
echo '<a class="danhmuc__link" href="./home.php">Trang chủ</a>';
echo '<a class="danhmuc__link" href="#">Giới thiệu</a>';
echo '<a class="danhmuc__link" href="#">Hỗ trợ</a>';
?> 
</div> 
</body>
</html>