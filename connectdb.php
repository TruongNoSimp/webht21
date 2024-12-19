<?php
$host = 'localhost';  // Tên host
$user = 'root';       // Tên tài khoản MySQL
$pass = '';           // Mật khẩu MySQL
$dbname = 'qldiem';   // Tên database

// Kết nối MySQL
$con = mysqli_connect($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
