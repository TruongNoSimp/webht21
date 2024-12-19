<?php
include 'connectdb.php';

// Lấy thông tin cần sửa
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM ket_qua WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}

// Cập nhật dữ liệu
if (isset($_POST['btnCapnhat'])) {
    $masv = $_POST['masv'];
    $mamon = $_POST['mamon'];
    $hoten = $_POST['hoten'];
    $diem = $_POST['diem'];

    $sql = "UPDATE ket_qua SET masv='$masv', mamon='$mamon', hoten='$hoten', diem='$diem' WHERE id = $id";
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
    <title>Sửa Kết Quả</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Sửa Kết Quả</h2>
        <form method="POST" class="mt-4">
            <div class="form-group">
                <label for="masv">Mã SV:</label>
                <input type="text" class="form-control" id="masv" name="masv" value="<?php echo $row['masv']; ?>" required>
            </div>
            <div class="form-group">
                <label for="mamon">Mã Môn:</label>
                <input type="text" class="form-control" id="mamon" name="mamon" value="<?php echo $row['mamon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="hoten">Họ Tên:</label>
                <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $row['hoten']; ?>" required>
            </div>
            <div class="form-group">
                <label for="diem">Điểm:</label>
                <input type="number" step="0.1" class="form-control" id="diem" name="diem" value="<?php echo $row['diem']; ?>" required>
            </div>
            <button type="submit" name="btnCapnhat" class="btn btn-primary">Cập Nhật</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>

