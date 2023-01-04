<head>
<meta charset="utf-8">
<title>Danh sách hóa đơn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="DinhDangAdmin.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="TrangChuAdmin.php"><img src="images/shoeslogo.png" alt="ảnh lỗi" ></a>
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

    <div class="col-md-12">
        <h4 class="TieuDe">DANH SÁCH HÓA ĐƠN</h4>
    </div>
    <form method="post" action="XuLyGiaoHang.php">
        <table class="text-center">
        
            <tr>
                <th>MÃ KH</th>
                <th>MÃ HÓA ĐƠN</th>
                <th>THỜI GIAN</th>
                <th>THÀNH TIỀN</th>
                <th>NGƯỜI NHẬN</th>
                <th>ĐỊA CHỈ</th>
                <th>SĐT</th>
                <th>ĐÃ GIAO</th>
            </tr>
                
            <?php
                include_once "CauHinh.php";
            
                $danhSach = $connect -> query("Select * from hoadon");
        
                while($row = $danhSach->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<input type='hidden' name=MaHD[] value=\"{$row["MaHD"]}\" />";
                    echo "<tr class='elem_row'>";
                    echo "<td style=\"width: 5%;\">{$row["MaND"]}</td>";
                    echo "<td style=\"width: 10%;\">{$row["MaHD"]}</td>";
                    echo "<td style=\"width: 10%;\">" . date_format(date_create($row["ThoiGian"]),'d/m/Y') . "</td>";
                    echo "<td style='width: 20%;'>{$row["TongTien"]}</td>";
                    echo "<td style=\"width: 10%;\">{$row["NguoiNhan"]}</td>";
                    echo "<td style=\"width: 15%;\">{$row["DiaChi"]}</td>";
                    echo "<td style=\"width: 10%;\">{$row["SDT"]}</td>";
                    
                    echo "<td style='width: 20%;'>";
                    if ($row["TrangThai"]==0)
                        echo "<input name=DaGiao[] type='checkbox' value='1' />";
                    else
                        echo "<input name=DaGiao[] type='checkbox' value='1' checked />";
                    echo "<input name=DaGiao[] type='hidden' value='0'/>";
                    echo "</td></tr>";
                }
            ?>
        </table>
        <div style="margin-top:10px; margin-bottom:20px; text-align:center;"><input type="submit" name="btnXacNhan" value="Xác nhận" class="btn btn-success" style="padding:10px;"/></div>
    </form>
    <div class="footer"></div>
</body>