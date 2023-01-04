<?php
	include_once "CauHinh.php";

	if ($connect -> query("Delete From sanpham
							Where id = {$_GET['id']}"))
		header("Location: DanhSachSP.php");
	else
		die ("Lỗi: ".$connect->error);
?>

