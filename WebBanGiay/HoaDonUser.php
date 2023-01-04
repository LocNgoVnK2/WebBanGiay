<head>
<meta charset="utf-8">
<title>Danh sách hóa đơn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="DinhDangUser.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
<link rel="stylesheet" href="DinhDangUser.css">

<?php
    session_start();
?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f97f51; height: 50px; ">
        <a class="navbar-brand" href="TrangChuUsers.php"><img src="images/shoeslogo.png"
                alt="ảnh lỗi"></a>
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
<div class="container" style="min-height:100%">
        <div class="col-md-12">
            <h4 style="font-weight: 700; margin: 50px; text-align: center;">ĐƠN HÀNG CỦA BẠN</h4>
        </div>
        <table class="text-center" style="width: 100%; margin-bottom: 20px;">
           
            <tr style="border-bottom: 1px solid black;">
                <th>MÃ HÓA ĐƠN</th>
                <th>THỜI GIAN</th>
                <th>THÀNH TIỀN</th>
                <th>ĐÃ GIAO</th>
            </tr>
                
            <?php
                include_once "CauHinh.php";
            
                $userID = $_SESSION["dataUser"]["MaND"];
                $danhSach = $connect -> query("Select * from hoadon Where MaND='$userID'");
           
                while($row = $danhSach->fetch_array(MYSQLI_ASSOC))
                {
                    echo "<tr style=\"border-bottom: 1px solid black; height: 150px;\">";
                    echo "<td style=\"width: 30%;\">{$row["MaHD"]}</td>";
                    echo "<td style=\"width: 20%;\">" . date_format(date_create($row["ThoiGian"]),'d/m/Y') . "</td>";
                    echo "<td style='width: 30%;'>{$row["TongTien"]}</td>";
                    if ($row["TrangThai"]==0)
                        echo "<td style='width: 20%;'><input type='checkbox' disabled/></td>";
                    else
                        echo "<td style='width: 20%;'><input type='checkbox' checked disabled/></td>";
                    echo "</tr>";
                }
            ?>
            <tr>
                <td colspan="3" style="text-align: left;padding-top:30px;"><a href="TrangChuUsers.php" style="font-size: 20px; ">Tiếp tục mua hàng</a></td>
            </tr>
        </table>
</div>
<div class="footer" style="height: 50px; background-color: #f97f51; text-align: center; padding: 20px; display: table; width: 100%; color: white">
        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</p>
</div>
</body>