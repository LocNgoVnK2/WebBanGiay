<?php
    session_start();
    $_SESSION["SanPhamID"] = $_GET["id"];
    if (isset($_SESSION["dataUser"]["QuanTriVien"]))
    {
        $quyenHan = $_SESSION["dataUser"]["QuanTriVien"];
        if($quyenHan==1)
            header("Location: ChiTietSPAdmin.php");
        else
            header("Location: ChiTietSPUser.php");
    }
    else
        header("Location: ChiTietSP.php");

    
?>