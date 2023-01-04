<?php
    include_once "CauHinh.php";
    if (isset($_POST["btnXacNhan"]))
    {
        $maHD = $_POST["MaHD"];
        $trangThai = $_POST["DaGiao"];
        $length = count($maHD);
        $t = 0;
        for($i=0; $i<$length; $i++)
        { 
            if ($trangThai[$t]==1)
            {
                $sql= "Update `hoadon` Set `TrangThai` = '1' Where MaHD={$maHD[$i]}";
                $t+=2;
            }
            else
            {
                $sql= "Update `hoadon` Set `TrangThai` = '0' Where MaHD={$maHD[$i]}";
                $t++;
            }
            $connect -> query($sql);
        }  
        
        header("Location:HoaDonAdmin.php");
    }
        
?>