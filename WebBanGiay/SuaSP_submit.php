<?php
    include_once "CauHinh.php";
    if ((!isset($_POST["MaSP"])) || (!isset($_POST["TenSP"])) || (!isset($_POST["HinhAnh"])) || (!isset($_POST["TieuDe"])) || (!isset($_POST["MoTa"])) || (!isset($_POST["Loai"]))||
    (!isset($_POST["DonGia"]))||(!isset($_POST["SoLuong"])))
    {
        echo "Sửa thất bại! Các trường đều phải được điền.";
        echo "<a href='SuaSP.php'>Chỉnh sửa lại thông tin sản phẩm.</a>";
    }
    else
    {
        $maSP = $_POST["MaSP"];
        $tenSP = $_POST["TenSP"];
        $hinhAnh = $_POST["HinhAnh"];
        $tieuDe = $_POST["TieuDe"];
        $moTa = $_POST["MoTa"];
        $loai = $_POST["Loai"];
        $donGia = $_POST["DonGia"];
        $soLuong = $_POST["SoLuong"];
            
        $sql = "Update sanpham 
            Set TenSP = '$tenSP',
            HinhAnh = '$hinhAnh',
            TieuDe = '$tieuDe',
            MoTa = '$moTa',
            MaLoai = '$loai',
            DonGia = '$donGia',
            SoLuong = '$soLuong'
            Where id = '$maSP'";
        if ($connect -> query($sql))
            header("Location: DanhSachSP.php");
        else
            header("Location: ThongBaoLoi.php");
    }
		
?>
