<?php
include 'connectdb.php';

// Xóa dữ liệu
if (isset($_GET['xoa_id'])) {
    $id = $_GET['xoa_id'];
    mysqli_query($con, "DELETE FROM ket_qua WHERE id = $id");
}

// Tìm kiếm
$keyword_mamon = "";
$keyword_hoten = "";
if (isset($_POST['btnTimkiem'])) {
    $keyword_mamon = $_POST['keyword_mamon'];
    $keyword_hoten = $_POST['keyword_hoten'];
}
$sql = "SELECT * FROM ket_qua WHERE mamon LIKE '%$keyword_mamon%' AND hoten LIKE '%$keyword_hoten%'";
$data = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ThiThi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Bảng điểm</h2>
        <a href="themmoi.php" class="btn btn-primary mb-3">Thêm mới</a>
        <!-- Form tìm kiếm -->
        <form method="POST" class="form-inline mb-3">
            <input type="text" class="form-control mr-2" name="keyword_mamon" value="<?php echo $keyword_mamon; ?>" placeholder="Nhập mã môn">
            <input type="text" class="form-control mr-2" name="keyword_hoten" value="<?php echo $keyword_hoten; ?>" placeholder="Nhập họ tên">
            <button type="submit" name="btnTimkiem" class="btn btn-success">Tìm Kiếm</button>
        </form>

        <!-- kết quả -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Mã SV</th>
                    <th>Mã Môn</th>
                    <th>Họ Tên</th>
                    <th>Điểm</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['masv']; ?></td>
                    <td><?php echo $row['mamon']; ?></td>
                    <td><?php echo $row['hoten']; ?></td>
                    <td><?php echo $row['diem']; ?></td>
                    <td>
                        <a href="suamoi.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="indexmoi.php?xoa_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?');">
                            Xóa
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>