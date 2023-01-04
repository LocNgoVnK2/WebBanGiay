<?php
include_once "CauHinh.php";

$userID = 2;
$sanphamID = $_POST["txtID"];
$soLuong = $_POST["nbSoLuong"];

$sql = "INSERT INTO `giohang` (`MaND`,`MaSP`,`SoLuong`) 
        VALUES (2,$sanphamID,$soLuong) 
        ON DUPLICATE KEY UPDATE `SoLuong` = `SoLuong` + VALUES(`SoLuong`);";

if($connect -> query($sql))
    header("Location:")

?>