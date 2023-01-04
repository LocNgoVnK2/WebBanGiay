<?php
    session_start();

    include_once "CauHinh.php";

    $userID = $_SESSION["dataUser"]["MaND"];
    $sanPham = $_POST["ID"];
    $soLuong = $_POST["SoLuong"];
    $thanhTien = $_POST["hdThanhTien"];
    $tongTien = $_POST["hdTamTinh"];
    $mydate=getdate();
    $maHD = strval($userID) . strval($mydate['mday']) . strval($mydate['mon']) . strval($mydate['year']) . strval($mydate['hours']) . strval($mydate['minutes']) . strval($mydate['seconds']);
    $mydate =strval($mydate['year'])."-".strval($mydate['mon'])."-".strval($mydate['mday']);

    $insertHD = "Insert Into `hoadon`(`MaHD`,`ThoiGian`,`MaND`,`TongTien`) Values('$maHD','$mydate','$userID','$tongTien')";
    if($connect->query($insertHD))
    {
        echo "success";
        $length = count($sanPham);
        for ($i=0;$i<$length;$i++)
        {
            $connect -> query("Insert Into `ct_hoadon` Values('$maHD',{$sanPham[$i]},{$soLuong[$i]},{$thanhTien[$i]})");
            $connect -> query ("Update sanpham Set `SoLuong`=`SoLuong` - {$soLuong[$i]} Where id='{$sanPham[$i]}'");
            $connect -> query ("Delete From giohang Where MaND = '$userID' And MaSP = '{$sanPham[$i]}'");
        }
        header("Location:ThanhToan.php?id=".$maHD);
    }
    
    
?>