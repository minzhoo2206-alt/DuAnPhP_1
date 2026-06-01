<?php
session_start();
unset($_SESSION['mangSinhVien']);
header("Location: nhap_sinh_vien.html");
exit();
?>