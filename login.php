<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .formlg{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include('connect.php');

if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
$sql = "SELECT * FROM dangnhap WHERE tendangnhap = '$name' AND matkhau ='$pass' ";
$result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['mySession'] = $name;
        header('location:home.php');
    }else{
        echo 'Tên đăng nhập hoặc mật khẩu sai!';
    }
}
?>

<div class="formlg">
<form style="border: 1px solid black;width: 180px;padding: 10px;" action="login.php" method="POST">
<label for="">Tên đăng nhập</label>
<input style="margin: 10px 0 10px 0;"  type="text" name="name">
<br>
<label  for="">Mật khẩu</label>
<input style="margin: 10px 0 10px 0;" type="password" name="pass">
<br>
<button  style="margin: 10px 20px 10px 0;"  type="submit" name="btn">Đăng nhập</button>
<button  style="margin: 10px 0 10px 0;"  type="submit" name="btn"><a style="text-decoration: none;" href="./dangky.php">Đăng ký</a></button>
</form>
</div>
</body>
</html>