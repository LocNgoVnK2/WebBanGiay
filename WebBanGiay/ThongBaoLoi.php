<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="DinhDangUser.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
   
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="TrangChuUsers.php"><img src="images/shoeslogo.png"
                alt="ảnh lỗi"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        session_start();
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
    <div style="width:100%; text-align:center">
        <img src="images/loi.jpg" width="70%">
        <a href="ThemSP.php" style="color:green; display:block; text-align:center; font-size:20pt">Nhập lại thông tin sản phẩm</a>
    </div>
</body>