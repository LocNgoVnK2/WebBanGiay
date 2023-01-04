<?php
    include_once "CauHinh.php";
    $nguoiNhan = $_POST['NguoiNhan'];
    $sdt = $_POST['SDT'];
    $maHD = $_POST['MaHD'];
    $sql = "Update `hoadon` set `NguoiNhan`=N'$nguoiNhan', `SDT`='$sdt',`DiaChi`=N'$maHD' Where MaHD='$maHD'";
    $connect -> query($sql);
    header("Location: CamOn.php");
?>