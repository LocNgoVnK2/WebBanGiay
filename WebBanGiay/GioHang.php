<head>
<meta charset="utf-8">
<title>Giỏ hàng</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="DinhDangUser.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

<?php
    session_start();
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
<div class="container" style="min-height: 100%;">
        <div class="col-md-12">
            <h4 style="font-weight: 700; margin-top: 50px; text-align: center;">GIỎ HÀNG CỦA BẠN</h4>
        </div>
        <form method="post" action="GioHang_submit.php" style="margin: auto; width:100%;">
        <table class="text-center" style="width: 100%; margin-bottom: 20px;">
           
            <tr>
                <th></th>
                <th>TÊN SẢN PHẨM</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ</th>
                <th>THÀNH TIỀN</th>
            </tr>
                
            <?php
                include_once "CauHinh.php";
                $userID = $_SESSION["dataUser"]["MaND"];
                $sql = "Select MaND,MaSP,TenSP,HinhAnh,DonGia,sanpham.SoLuong SoLuongTon,giohang.SoLuong From `giohang`,`sanpham` Where giohang.MaSP=sanpham.id And MaND=$userID";
                $danhSach = $connect -> query($sql);
                while($row = $danhSach->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<tr style='border-bottom: 1px solid black; height: 150px;'>";
                    echo "<td style='width: 10%;'>";
                    echo "<input type='hidden' name=ID[] value='{$row["MaSP"]}'/>";
                    echo "<img src={$row["HinhAnh"]} alt='lỗi ảnh' style='width: 100%;'>";
                    echo "</td>";
                    echo "<td style='width: 20%;'>{$row["TenSP"]}</td>";
                    echo "<td style='width: 20%;'>";
                        echo "<div class='input-group'>";
                        echo "<input name=SoLuong[] onchange='TinhTien()' type='number' class='form-control text-center' max={$row["SoLuongTon"]} min='0' value={$row["SoLuong"]}>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td name='DonGia' style='width: 20%;'>{$row["DonGia"]}</td>";
                    echo "<td name='ThanhTien' style='width: 20%;'></td>";
                    echo "<input type='hidden' name=hdThanhTien[] style='width: 20%;' value=''/>";
                    echo "<td style='width: 10%;'><a href='XoaHang.php?id={$row["MaSP"]}'><img src='https://www.svgrepo.com/show/244047/delete-trash.svg' style='width: 30px;'></a></td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td colspan="3" style="text-align: left;"><a href="TrangChuUsers.php" style="font-size: 20px;">Tiếp tục mua hàng</a></td>
                <td style="font-size: 20px; padding-top: 10px;">Tạm tính:</td>
                <td style="padding-top: 10px;"><span id="TamTinh" style="color: red; font-size: 20px;"></span> VND</td>
                <input type='hidden' name='hdTamTinh' style='width: 20%;' value=""/>
                <td></td>
            </tr>
            <tr><td colspan="5" style="padding-top: 30px;"><input type="submit" class="btn btn-danger" style="padding: 20px 12px" value="THANH TOÁN NGAY"/></td></tr>
        </table>
        </form>
</div>
<script>
    function TinhTien()
    {
        
        let soLuong = document.getElementsByName("SoLuong[]");
        let donGia = document.getElementsByName("DonGia");
        let thanhTien = document.getElementsByName("ThanhTien");
        let hdthanhTien = document.getElementsByName("hdThanhTien[]");
        
        let tongTien = 0;
        for (var i = 0; i < soLuong.length; i++) {
            thanhTien[i].innerHTML = eval(soLuong[i].value) * eval(donGia[i].innerHTML);
            hdthanhTien[i].value = eval(thanhTien[i].innerHTML);
            tongTien += eval(thanhTien[i].innerHTML);
        }
        
        document.getElementById("TamTinh").innerHTML = tongTien;
        document.getElementsByName("hdTamTinh")[0].value = tongTien; 
    }
    TinhTien();
</script>
<div class="footer">
        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>
</body>