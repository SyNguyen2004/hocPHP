<?php
session_start();
include("./connect.php");
if(isset($_SESSION['mySession'])){
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'comments':
                if(isset($_POST['submit_comments'])){
                    $user_id = $_SESSION['mySession'];
                    $content = $_POST['content'];
                    $product_id = $_GET['id'];
                    $sql = "INSERT INTO binhluan (user_id, noidung, product_id) 
                    VALUES ('$user_id','$content','$product_id')";
                    $result = mysqli_query($conn, $sql);
                    header("location:detail.php?id=$product_id");
                }
                break;
        }
    }
}else{
    echo "Vui lòng đăng nhập để bình luận!";
}
?>