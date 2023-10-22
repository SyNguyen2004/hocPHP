
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
        .app{
            width: 1000px;
        }
        .row{
            display: flex;
            flex-direction: row-reverse;
        }
        .tbdm{
            width: 200px;
            margin-top: 20px;
        }
        .danhmucsp{
            text-decoration: none;
            font-size: 20px;
            color: black;
            padding: 10px;
        }
        .danhmucsp:hover{
         cursor: pointer;
         color: orangered;
        }
        .products{
           width: 800px;
        }
.grid__row {
  width: 800px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}
.products__item {
  width: 25%;
  height: 270px;
  border: 1px solid black;
  margin-top: 20px;
}
.products__img {
  padding-top: 100%;
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center;
}
.products__content {
  display: flex;
  margin: 10px 10px 6px 10px;
  justify-content: space-between;
}
.products__title {
  flex: 2;
}
.div {
  flex: 1;
}
.products__price {
    font-size: 14px;
}

.products__name {
  margin-top: 4px;
  font-size: 18px;
  font-weight: 500;
  line-height: 18px;
  display: block;
  height: 36px;
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line: 2;
}
.products__quantity {
  width: 30px;
  margin-left: 35px;
}
.products__btn {
  background-color: rgb(255, 83, 20);
  color: #fff;
  font-size: 14px;
  margin-top: 8px;
  height: 30px;
}
.products__btn:hover {
  cursor: pointer;
}

    </style>
</head>
<body>
   <div class="app">
    
    <?php
     include('connect.php');
     include('menu.php');
    ?>
    <div class="row">
        <div class="box">
        <div class="div">
        <?php
         include('login.php')
        ?>
    </div>
 <div>
    <table class="tbdm" border="1">
    <tr><th>Danh mục</th></tr>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "login");
    $sta = ("SELECT * FROM danhmuc");
    $kq = mysqli_query($conn, $sta);
    while($row = mysqli_fetch_array($kq)){
    echo '<tr><td> <a class="danhmucsp" href="sanpham.php?id='.$row['id'] .'">'.$row['tendanhmuc'].'</a></td></tr>';
    }
    ?>
 </table>
 </div>
    </div>
   <div class="products">
     <div class="grid__row">
       <?php 
        if(isset($_GET['trang'])){
         $page = $_GET['trang'];
        }else{
         $page = 0;
        }
        if($page == 0|| $page == 1){
         $begin = 1;
        }else{
         $begin = ($page * 3) - 3;
        }
        $sta = ("SELECT * FROM sanpham ORDER BY id ASC LIMIT $begin,3");
        $kq = mysqli_query($connect, $sta);
        while($row = mysqli_fetch_array($kq)){ ?>
      <div class="products__item">
        <div
          class="products__img"
          style="
            background-image: url('./img/<?php echo $row['hinhanh']?>');
          "
        ></div>
        <div class="products__content">
          <div class="products__title">
            <span class="products__price"> <?php echo number_format($row['gia'],0,",",".")?> đ</span>
            <h3 class="products__name"><?php echo $row['tensanpham']?></h3>
          </div>
          <div class="div">
            <a style="text-decoration: none;" href="detail.php?id=<?php echo $row['id']?>"><input type="submit" class="products__btn" value="Đặt hàng"/></a>
          </div>
        </div>
        </div>
    <?php }?>
      </div>
    </div>
    </div>
    <div style="float: right;margin-right: 230px;" class="">
    <?php
    $sql_trang = mysqli_query($connect, "SELECT * FROM sanpham");
    $numrow = mysqli_num_rows($sql_trang);
    $trang = ceil($numrow / 3);
    ?>
      <ul style="list-style: none;display: flex;">
      <?php
      for ($i = 1; $i <= $trang; $i++) {
        ?>
        <li><a <?php if ($i == $page) {
          echo 'style="background-color:red;text-decoration: none;color: #fff;padding: 5px 10px ; margin: 5px;"';
        }?> 
        style="text-decoration: none;color: #fff;padding: 5px 10px ;background-color: gray; margin: 5px;" 
        href="home.php?trang=<?=$i?>"><?=$i?></a></li>
        <?php } ?>
      </ul>
    </div>
    </div>
</body>
</html>