<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="DinhDangAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" >
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

    <div class="col-md-12">
        <h4 class="TieuDe">DANH SÁCH SẢN PHẨM</h4>
    </div>
    <div style="margin-top:20px; margin-bottom:20px; text-align:right">
        <a href="ThemSP.php"><button name="btnThem" class="btn btn-success">Thêm sản phẩm</button></a>
    </div>
    <table class="text-center">
        <tr>
            <th>ID</th>
            <th>TÊN SẢN PHẨM</th>
            <th>HÌNH ẢNH</th>
            <th>ĐƠN GIÁ</th>
            <th>TIÊU ĐỀ</th>
            <th>MÔ TẢ</th>
            <th>LOẠI</th>
            <th>SỐ LƯỢNG</th>
            <th colspan="2">HÀNH ĐỘNG</th>
            </tr>

            <?php
    include_once "CauHinh.php";

    $danhSach = $connect->query("Select * from sanpham,loai where sanpham.MaLoai = loai.MaLoai ORDER BY `id`");

    while ($row = $danhSach->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr class='elem_row'>";
        echo "<td width: 5% class='box_row'>{$row["id"]}</td>";
        echo "<td width: 10%>{$row["TenSP"]}</td>";
        echo "<td width: 10%><img src={$row["HinhAnh"]} height='100px'></td>";
        echo "<td width: 10%>{$row["DonGia"]}</td>";
        echo "<td width: 10%>{$row["TieuDe"]}</td>";
        echo "<td width: 15%>{$row["MoTa"]}</td>";
        echo "<td width: 5%>{$row["TenLoai"]}</td>";
        echo "<td width: 5%>{$row["SoLuong"]}</td>";
        echo "<td width: 15% class='box_row'><a href='SuaSP.php?id={$row["id"]}'>Sửa</a></td>";
        echo "<td width: 15% class='box_row'><a href='XoaSP.php?id={$row["id"]}'>Xóa</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
    <div class="footer"></div>
</body>