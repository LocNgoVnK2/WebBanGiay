<head>
    <meta charset="utf-8">
    <title>Chi tiết sản phẩm</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="DinhDangUser.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: 'Muli', sans-serif;
        }
        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        }
        .alert.success {background-color: #04AA6D;}
        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }
        .closebtn:hover {
        color: black;
        }
    </style>

    <?php
        session_start();
        include_once "CauHinh.php";
        if (isset($_SESSION["SanPhamID"]))
        {
            $sanphamID = $_SESSION["SanPhamID"];
            if ($sanPham = $connect -> query("Select * From sanpham, loai where id = '$sanphamID' And sanpham.MaLoai = loai.MaLoai"))
                $sanPham = $sanPham->fetch_array(MYSQLI_ASSOC);
            else
                echo "Lỗi: ". $connect->error;
        }

    ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="TrangChuUsers.php"><img src="images/shoeslogo.png" alt="ảnh lỗi"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo($_SESSION['dataUser']['TenND']);
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="HoaDonUser.php">Đơn hàng</a>
                        <a class="dropdown-item" href="GioHang.php">Giỏ hàng</a>
                        <a class="dropdown-item" href="DangXuat.php">Đăng xuất</a>
                        
                    </div>
                </li>
            </ul>
          
        </div>
    </nav>
    <?php
    if (isset($_POST["btnThem"]))
    {
        $userID = $_SESSION["dataUser"]["MaND"];
        $soLuong = $_POST["nbSoLuong"];

        $sql = "INSERT INTO `giohang` (`MaND`,`MaSP`,`SoLuong`) 
                VALUES ($userID,$sanphamID,$soLuong) 
                ON DUPLICATE KEY UPDATE `SoLuong` = `SoLuong` + VALUES(`SoLuong`);";

        if($connect -> query($sql))
            echo "<div class=\"alert success\">
            <span class=\"closebtn\">&times;</span>  
            <strong>Thành công!</strong> Sản phẩm đã được thêm vào giỏ hàng.
          </div>";
        else
        echo "<div class=\"alert\">
        <span class=\"closebtn\">&times;</span>  
        <strong>Thất bại!</strong>  Sản phẩm không được thêm vào giỏ hàng.
      </div>
      ";
    }
?>

<div class="container" style="margin: 50px auto;">
    <div class="row">
        <div class="col-md-12">
        <h2 style="font-weight: 700; margin-bottom: 30px;"> <?php
                        echo $sanPham["TenSP"];
                    ?></h2>
        </div>
        <div class="col-md-6">
            <img src="<?php echo $sanPham["HinhAnh"] ?>" alt="ảnh lỗi" style="width: 100%;">
        </div>
            <form name="f" method="POST" action="ChiTietSPUser.php?id=<?php echo $sanphamID;?>">
                <table class="table">
                    <?php
                        $donGia = number_format($sanPham["DonGia"]);
                        echo 
                        "
                        <tr><td>{$sanPham["TenLoai"]}</td></tr>
                        <tr><td>Giá bán: <span style=\"font-size: 20px; font-weight: 700;\">$donGia VND</span></td></tr>
                        <tr><td>Số lượng: <input type=\"number\" name=\"nbSoLuong\" min=\"1\" max={$sanPham["SoLuong"]} value=\"1\"/></td></tr>
                        ";
                    ?>
                    <tr><td>Trạng thái: 
                    <?php
                        if ($sanPham["SoLuong"]>0)
                            echo "<span style=\"color: green;\">Còn hàng</span></td></tr>";
                        else
                            echo "<span style=\"color: red;\">Hết hàng</span></td></tr>";
                    ?>    
                    
                    <tr><td><input name="btnThem" type="submit" value="Thêm vào giỏ hàng" class="btn btn-success"/></td></tr>
                    <tr><td><a href="TrangChuUsers.php">Quay về trang chủ</a></td></tr>
                </table>
            </form>
        <div class="col-md-12">
            <h2>Mô tả</h2>
            <?php
                echo $sanPham["MoTa"];
            ?>
        </div>
    </div>
</div>
            <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
        }
        </script>
<div class="footer" style="height: 50px; background-color: #f97f51; text-align: center; padding: 20px; display: table; width: 100%; color: white">
        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>
</body>