<head>
    <title>Trang Chủ</title>
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
<nav class="navbar navbar-expand-lg navbar-light" >
        <a class="navbar-brand" href="TrangChu.php"><img src="images/shoeslogo.png"
                alt="ảnh lỗi"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="DangNhap.php" class="btn btn-outline-success my-2 my-sm-0" id="nut" role="button"
                        aria-pressed="true">Đăng Nhập</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="TimKiem.php" method="get">
                        <input class="form-control mr-sm-2" type="text" name="txtSearch" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" id="nut" type="submit">Search</button>
                    </form>
        </div>
    </nav>
        <?php
        include_once "BodyTrangChu.php";
        ?>
    
</body>