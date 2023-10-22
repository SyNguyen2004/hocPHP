<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <?php 
    include('./connect.php');
    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = array();
    }
    $error = false;
    if(isset($_GET['action'])){
        function update_cart($add = false){
            foreach($_POST['quantity'] as $id => $quantity){
                if($add){
                    $_SESSION["cart"][$id] += $quantity;
                }else{
                    $_SESSION["cart"][$id] = $quantity;
                }
                }
        }
        switch ($_GET['action']){
            case 'add':
                update_cart(true);
                break;
            case 'delete':
                if(isset($_GET['id'])){
                    unset($_SESSION["cart"][$_GET["id"]]);
                    header('location:cart.php');
                }
                break;
            case 'submit':
                if(isset($_POST['btn_update'])){
                    update_cart();
                    header('location:cart.php');
                }
                else if(isset($_POST['btn'])){
                    if(empty($_POST['name'])){
                        $error= "Bạn chưa nhập tên.";
                    }else if(empty($_POST['phone'])){
                        $error= "Bạn chưa nhập sdt";
                    }else if(empty($_POST['add'])){
                        $error= "Bạn chưa nhập địa chỉ";
                    }else{
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $add = $_POST['add'];
                        $note = $_POST['note'];
                        $sql = "INSERT INTO `order`(`name`, `phone`, `address`, `note`) 
                        VALUES ('$name','$phone','$add','$note')";
                        $result = mysqli_query($conn, $sql);
                        echo 'Bạn đã đặt hàng thành công!';
                        header('location:cart.php');
                    }
                }
                break;
        }
    }
    if(!empty($_SESSION["cart"])){
        $result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id IN (".implode(",", array_keys($_SESSION["cart"])).")");
    }
    ?>
    <div class="cart">
        <a href="./home.php" class="cart__home">Trang chủ</a>
        <h1 class="cart__title">
            Giỏ hàng
        </h1>
        <form action="cart.php?action=submit" method="post" >
        <table style="text-align: center;" border="1" class="cart__table">
            <tr>
            <th width="40">STT</th>
            <th width="400">Tên sản phẩm</th>
            <th width="200">Ảnh sản phẩm</th>
            <th style="color: red;" width="150">Đơn giá</th>
            <th width="70">Số lượng</th>
            <th width="150">Thành tiền</th>
            <th width="50">Xóa</th>
            </tr>
            <?php
            $total = 0;
            $num =1;
            while($row = mysqli_fetch_array($result)){ 
            ?>
            <tr>
                <td><?php echo $num?></td>
                <td><?php echo $row['tensanpham']?></td>
                <td><img style="margin:5px 50px 5px 50px;" width="100" height="100" src="./img/<?php echo $row['hinhanh']?>" alt=""></td>
                <td style="color: red;"><?php echo number_format($row['gia'],0,",",".")?> đ</td>
                <td><input size="2" type="text" name="quantity[<?php echo $row['id']?>]" value="<?=$_SESSION["cart"][$row['id']]?>"></td>
                <td><?php echo number_format($row['gia'] * $_SESSION["cart"][$row['id']],0,",",".")?> đ</td>
                <td><a style="text-decoration: none;" href="./cart.php?action=delete&id=<?php echo $row['id']?>">Xóa</a></td>
            </tr>
            <?php
            $total += $row['gia'] * $_SESSION["cart"][$row['id']];
               $num++;
            }?>
            <tr style="background-color: darkgray;">
                <td>&nbsp</td>
                <td>Tổng tiền</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td><?php echo number_format($total,0,",",".") ?> VNĐ</td>
                <td>&nbsp</td>
            </tr>
        </table>
        <input type="submit" style="float: right; margin: 10px 0;cursor: pointer;" value="Cập nhật" name="btn_update" />
        <hr style="margin-top: 50px;">
            <label for="">Người nhận:</label>
            <input  type="text" name="name" id="">
            <br>
            <br>
            <label for="">Điện thoại:</label>
            <input style="margin-left: 9px;" type="number" name="phone" id="">
            <br>
            <br>
            <label for="">Địa chỉ:</label>
            <input style="margin-left: 29px;" type="text" name="add" id="">
            <br>
            <br>
            <label for="">Ghi chú:</label>
            <textarea style="margin-left: 25px;" name="note" id="" cols="30" rows="10"></textarea>
            <br>
            <br>
        <input type="submit" style=" margin: 10px 0;cursor: pointer;" value="Đặt hàng" name="btn"/>
        </form>
    </div>
</body>
</html>