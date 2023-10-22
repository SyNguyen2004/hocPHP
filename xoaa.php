<?php
session_start();
include('connect.php');
if(isset($_SESSION['mySession'])){
    $id = $_GET['id'];
if(isset($_GET['id'])){
    $sql = "DELETE FROM sanpham WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    header('location:cart.php');
}
}else{
    header('location:login.php');
}
?>