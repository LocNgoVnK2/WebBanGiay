<?php
session_start();
 $search = addslashes($_GET['txtSearch']);

 if(isset($_SESSION['dataUser'])==false){
    header('Location: TrangChu.php?search='.$search);
 }else{
    if($_SESSION['dataUser']['QuanTriVien']==1){
        header('Location: TrangChuAdmin.php?search='.$search);
    }else if($_SESSION['dataUser']['QuanTriVien']==0){
        header('Location: TrangChuUsers.php?search='.$search);
    }
}/*else if($_SESSION['dataUser']['QuanTriVien']==''){
        header('Location: TrangChu.php?search='.$search);
    }
*/
?>