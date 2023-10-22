<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product{
            border: solid 1px black;
            padding: 20px;
            width: 800px;
        }
        .product__title{

        }
.product__detail{
    display: flex;
}
.product__content{
margin-left: 20px;
display: flex;
flex-direction: column;
justify-content: space-around;
}
.btn:hover{
    cursor: pointer;
    background-color: red;
    color: black;
}
.product__note{

}
    </style>
</head>
<body>
    <div class="product">
        <h1 class="product__title">
            Chi tiết sản phẩm
        </h1>
        <hr>
        <div class="product__detail">
            <?php
     session_start();
     include('connect.php');
         if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM sanpham WHERE id = $id";
            $result = mysqli_query($conn, $sql); 
             while($row = mysqli_fetch_array($result)){ ?>

        <img style="border: 1px solid black; padding: 5px;" width="200px" height="200px" src="./img/<?php echo $row['hinhanh'] ?>" alt="">
        <div class="product__content">
            <h3 class="product__name">
                <?php echo $row['tensanpham'] ?>
            </h3>
            <span class="product__price">
              Giá:<span style="color: red;"><?php echo number_format($row['gia'], 0, ",", ".") ?>đ</span>
            </span>
            <form action="cart.php?action=add" method="post">
            <input style="width: 30px;" type="number" value="1" name="quantity[<?=$row['id']?>]">
            <input class="btn" style="background-color: black;color: white; height:40px;border-radius: 3px;" type="submit" name="" id="" value="Mua sản phẩm">
            </form>
            <li class="product__note">
                 256GB          
            </li>
            <li class="product__note">
                 Màu xanh          
            </li>
        </div>
        <?php 
             }    
            } ?>
            </div>
            <div style="margin-top: 20px;margin-left: 50px;background-color:gainsboro;border-radius: 5px;padding: 10px;" class="comment">
                <form action="handle.php?action=comments&id=<?=$_GET['id']?>" method="post">
                <div class="form-comments">
                <p style="font-size: 16px;color: #333;font-weight: 500;">Để lại bình luận dưới đây</p>
                <textarea name="content" id="" cols="40" rows="3" placeholder="Viết bình luận..."></textarea>
                <br>
                <input style="margin-top: 20px;background-color: dodgerblue; color: #fff;border-radius: 3px;font-size: 16px;" type="submit" name="submit_comments" value="Gửi">
            </div>
            </form>
            </div>
            <hr>
            <div  class="showComments">
                <ul style="margin-left: 20px;">
                <?php
                 $id = $_GET['id'];
                 $statement = "SELECT * FROM binhluan WHERE product_id =$id ";
                 $result = mysqli_query($conn, $statement); 
                 while($row = mysqli_fetch_array($result)){ ?>
                  <li style="list-style: none;background-color: aliceblue;padding: 10px; border-radius:5px"><h3 style="margin: 0;"><?=$row['user_id']?></h3><p style="margin: 0;"><?=$row['noidung']?></p></li>
                    <?php 
             }    
             ?>
                </ul>
            </div>
    </div>
</body>
</html>