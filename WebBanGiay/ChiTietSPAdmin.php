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
        <a class="navbar-brand" href="TrangChuAdmin.php"><img src="images/shoeslogo.png" alt="ảnh lỗi"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ADMIN SITE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="DangXuat.php">Đăng xuất</a>
                        <a class="dropdown-item" href="HoaDonAdmin.php">Danh sách đơn hàng</a>
                        <a class="dropdown-item" href="DanhSachSP.php">Danh sách sản phẩm</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


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
            <form name="f" method="POST" action="SuaSP.php?id=<?php echo $sanphamID;?>">
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
                    
                    <tr><td><input name="btnXacNhan" type="submit" value="Sửa thông tin" class="btn btn-success"/></td></tr>
                    <tr><td><a href="TrangChuAdmin.php">Quay về trang chủ</a></td></tr>
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

<div class="footer" style="height: 50px; background-color: #f97f51; text-align: center; padding: 20px; display: table; width: 100%; color: white">
        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>
</body>