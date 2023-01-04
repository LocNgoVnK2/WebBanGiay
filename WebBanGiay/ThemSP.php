<head>
    <title>Thêm sản phẩm</title>
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="TrangChu.php"><img src="images/shoeslogo.png" alt="ảnh lỗi"></a>
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
        <h4 class="TieuDe">THÔNG TIN SẢN PHẨM</h4>
    </div>
    <form action="ThemSP_submit.php" method="post">
        <table class="form">
            
            <tr>
                <td>Tên sản phẩm:</td>
                <td><input type="text" name="TenSP" required/></td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td><input type="text" name="HinhAnh" /></td>
            </tr>
            <tr>
                <td>Tiêu đề: </td>
                <td><input type="text" name="TieuDe" /></td>
            </tr>
            <tr>
                <td>Mô tả: </td>
                <td><textarea name="MoTa" rows="5" cols="55"></textarea></td>
            </tr>
            <tr>
                <td>Loại: </td>
                <td>
                    <select name="Loai">
                        <?php
                        include_once "CauHinh.php";
                        $loaiList = $connect->query("Select * from loai");
                        while ($optRow = $loaiList->fetch_array(MYSQLI_ASSOC))
                            echo "<option value={$optRow["MaLoai"]}>{$optRow["TenLoai"]}</option>";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input type="number" name="DonGia" required/></td>
            </tr>
            <tr>
                <td>Số lượng: </td>
                <td><input type="number" name="SoLuong" required/></td>
            </tr>
        </table>
        <div style="margin-top: 10px; margin-bottom: 20px; text-align: center;"><input type="submit" name="btnXacNhan" value="Xác nhận" class="btn btn-success" style="padding:10px;"/></div>
    </form>
    <div class="footer"></div>
</body>