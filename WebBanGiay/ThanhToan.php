<head>
    <meta charset="utf-8">
    <title>Thanh toán</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: 'Muli', sans-serif;
    }
</style>
<?php
    session_start();
    include_once "CauHinh.php";

    $dataUser = $_SESSION["dataUser"];
    $maHD = $_GET["id"];

    $danhSach = $connect -> query("Select TenSP,HinhAnh,ct_hoadon.SoLuong,DonGia,ThanhTien from ct_hoadon,sanpham where ct_hoadon.MaHD = {$maHD} And ct_hoadon.MaSP = sanpham.id");

?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f97f51; height: 50px; ">
        <a class="navbar-brand" href="TrangChuUsers.php"><img src="images/shoeslogo.png"
                alt="ảnh lỗi" style="height: 150px;"></a>
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


<div class="container" style="margin: 50px auto;">
    <div class="row">
        <div style="width:30%; float: left; margin:50px">
        <h4 style="text-align: center;">THÔNG TIN GIAO HÀNG</h4>
            <form action="ThanhToan_submit.php" method="post">        
                <input type="hidden" name="MaHD" value="<?php echo $maHD;?>">
                <input type="text" placeholder="Họ và tên" name="NguoiNhan" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <input type="text" placeholder="Số điện thoại" name="SDT" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <input type="text" placeholder="Địa chỉ" name="DiaChi" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <a href="#" style="display: inline-block; margin-top: 10px;">Quay lại giỏ hàng</a>
                <input type="submit" class="btn btn-success" style="display: block; padding: 14px 12px; float: right; margin-top: 10px;" value="THANH TOÁN"/>
            </form> 
            
        </div>
        <div style="width:60%; clear:both; float: right">
        <h4 style="margin-bottom: 30px; text-align:center">DANH SÁCH SẢN PHẨM</h4>
            <table style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>SL</th>
                        <th>GIÁ</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = $danhSach->fetch_array(MYSQLI_ASSOC))
                        {
                            echo "<tr style='border-bottom: 1px solid black; height: 70px;'>";
                            echo "<td style='width: 10%;'>";
                                echo "<img src={$row["HinhAnh"]} alt='lỗi ảnh' style='width: 100%;'>";
                            echo "<td style='width: 40%;'>{$row["TenSP"]}</td>";
                            echo "<td style='width: 10%;'>{$row["SoLuong"]}</td>";
                            echo "<td style='width: 20%;'>{$row["DonGia"]} VND</td>";
                            echo "<td style='width: 20%;'>{$row["ThanhTien"]} VND</td>";
                            echo "</tr>";
                        }
                    ?>
                </tfoot>
                <tr>
                    <?php
                        $hoaDon = $connect -> query("Select TongTien from hoadon Where MaHD={$maHD}");
                        $hoaDon = $hoaDon->fetch_array(MYSQLI_ASSOC);
                        echo "<td style='text-align:right; padding-top:50px;' colspan='5'>TỔNG TIỀN:   {$hoaDon["TongTien"]} VND</td>"; 
                    ?>
                    
                </tr>
            </table>           
            </div>
        </div>
    </div>

    <div class="footer" style="height: 50px; background-color: #f97f51; text-align: center; padding: 20px; display: table; width: 100%; color: white">
        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>
</body>