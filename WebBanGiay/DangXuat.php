<?php
session_start();

unset($_SESSION['dataUser']);

header('Location: TrangChu.php');
?>