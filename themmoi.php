<?php
include 'connectdb.php';
// Xử lý thêm mới
if (isset($_POST['btnLuu'])) {
    $masv = $_POST['masv'];
    $mamon = $_POST['mamon'];
    $hoten = $_POST['hoten'];
    $diem = $_POST['diem'];

    $sql = "INSERT INTO ket_qua (masv, mamon, hoten, diem) VALUES ('$masv', '$mamon', '$hoten', '$diem')";
    if (mysqli_query($con, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Kết Quả</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Thêm Kết Quả</h2>
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="masv">Mã SV:</label>
                <input type="text" class="form-control" id="masv" name="masv" required>
            </div>
            <div class="form-group">
                <label for="mamon">Mã Môn:</label>
                <input type="text" class="form-control" id="mamon" name="mamon" required>
            </div>
            <div class="form-group">
                <label for="hoten">Họ Tên:</label>
                <input type="text" class="form-control" id="hoten" name="hoten" required>
            </div>
            <div class="form-group">
                <label for="diem">Điểm:</label>
                <input type="number" step="0.1" class="form-control" id="diem" name="diem" required>
            </div>
            <button type="submit" name="btnLuu" class="btn btn-primary">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>