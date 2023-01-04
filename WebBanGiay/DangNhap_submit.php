<?php
    session_start();
    include 'CauHinh.php';
   
    $TenDN = addslashes($_GET['userName']);
    $MatKhau = addslashes($_GET['Password']);
    
    $sql = "SELECT * FROM `taikhoan` WHERE TenND='$TenDN'";
    $query = mysqli_query($connect, $sql);
    $dataUser = mysqli_fetch_assoc($query);
    $checkTenDN = mysqli_num_rows($query);
   
    if ($checkTenDN == 1) {
        if($dataUser['MatKhau']== $MatKhau){
        
            $_SESSION['dataUser'] = $dataUser;
        
            if($dataUser['QuanTriVien'] == 1){
                header('Location: TrangChuAdmin.php');
            }else{
                header('Location: TrangChuUsers.php');
            }
            
         }else{
            header('Location: DangNhap.php');
         }
        
    } else {
        header('Location: DangNhap.php');
    }
    $connect->close();
    
?>