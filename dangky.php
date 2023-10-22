<?php
include('connect.php');
if(isset($_POST['btn'])){
        $user1 = $_POST['name'];
        $pass1= $_POST['pass'];
    $sql1 = "INSERT INTO dangnhap (tendangnhap,matkhau) 
    VALUES ('$user1','$pass1')";
    $result1 = mysqli_query($conn, $sql1);
    header('location:login.php');
}

?>
<form action="dangky.php" method="POST">
<label for="">Tên đăng nhập</label>
<input type="text" name="name">
<br>
<label for="">Mật khẩu</label>
<input type="pass" name="pass">
<br>
<button type="submit" name="btn">Đăng ký</button>
</form>