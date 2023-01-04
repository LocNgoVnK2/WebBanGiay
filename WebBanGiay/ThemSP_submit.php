<?php
    include_once "CauHinh.php";
    if ((!isset($_POST["TenSP"])) || (!isset($_POST["HinhAnh"])) || (!isset($_POST["TieuDe"])) || (!isset($_POST["MoTa"])) || (!isset($_POST["Loai"]))||
    (!isset($_POST["DonGia"]))||(!isset($_POST["SoLuong"])))
    {
        echo "Sửa thất bại! Các trường đều phải được điền.";
        echo "<a href='ThemSP.php'>Chỉnh sửa lại thông tin sản phẩm.</a>";
    }
    else
    {

        $tenSP = $_POST["TenSP"];
        $hinhAnh = $_POST["HinhAnh"];
        $tieuDe = $_POST["TieuDe"];
        $moTa = $_POST["MoTa"];
        $loai = $_POST["Loai"];
        $donGia = $_POST["DonGia"];
        $soLuong = $_POST["SoLuong"];
        $sql = "Insert Into `sanpham`(`TenSP`,`HinhAnh`,`TieuDe`,`MoTa`,`MaLoai`,`DonGia`,`SoLuong`)
        values('$tenSP','$hinhAnh','$tieuDe','$moTa','$loai','$donGia','$soLuong')";
        if ($connect -> query($sql))
        header("Location: DanhSachSP.php");
    else
        header("Location: ThongBaoLoi.php");
    }
?>
