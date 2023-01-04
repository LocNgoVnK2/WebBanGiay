<?php
session_start();
    include_once "CauHinh.php";
    $userID = $_SESSION['dataUser']['MaND'];
    $sanPhamID = $_GET["id"];

    $sql = "Delete From giohang Where MaSP='$sanPhamID' And MaND='$userID'";

    if ($connect->query($sql))
        header("Location: GioHang.php");
?>