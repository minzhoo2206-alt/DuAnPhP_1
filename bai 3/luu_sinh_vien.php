<?php

class SinhVien {
    private $mssv;
    private $hoTen;
    private $gioiTinh;
    private $ngaySinh;
    private $diemTB;

    public function __construct() {
        $this->mssv      = "";
        $this->hoTen     = "";
        $this->gioiTinh  = "";
        $this->ngaySinh  = "";
        $this->diemTB    = 0;
    }

    public function khoi_tao($mssv, $hoTen, $gioiTinh, $ngaySinh, $diemTB) {
        $this->mssv      = $mssv;
        $this->hoTen     = $hoTen;
        $this->gioiTinh  = $gioiTinh;
        $this->ngaySinh  = $ngaySinh;
        $this->diemTB    = $diemTB;
    }

    public function getMssv() {
        return $this->mssv;
    }

    public function getHoTen() {
        return $this->hoTen;
    }

    public function getGioiTinh() {
        return $this->gioiTinh;
    }

    public function getNgaySinh() {
        return $this->ngaySinh;
    }

    public function getDiemTB() {
        return $this->diemTB;
    }

    public function setMssv($mssv) {
        $this->mssv = $mssv;
    }

    public function setHoTen($hoTen) {
        $this->hoTen = $hoTen;
    }

    public function setGioiTinh($gioiTinh) {
        $this->gioiTinh = $gioiTinh;
    }

    public function setNgaySinh($ngaySinh) {
        $this->ngaySinh = $ngaySinh;
    }

    public function setDiemTB($diemTB) {
        $this->diemTB = $diemTB;
    }

    public function hienThiThongTin() {
        echo "Mã SV  : " . $this->getMssv()     . "<br>";
        echo "Họ tên : " . $this->getHoTen()    . "<br>";
        echo "Giới tính: " . $this->getGioiTinh() . "<br>";
        echo "Ngày sinh: " . $this->getNgaySinh() . "<br>";
        echo "Điểm TB: " . $this->getDiemTB()   . "<br>";
    }
}

session_start();
if (!isset($_SESSION['mangSinhVien'])) {
    $_SESSION['mangSinhVien'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mssv      = $_POST['mssv'];
    $hoTen     = $_POST['hoTen'];
    $gioiTinh  = $_POST['gioiTinh'];
    $ngaySinh  = $_POST['ngaySinh'];
    $diemTB    = $_POST['diemTB'];

    $sinhVien = new SinhVien();
    $sinhVien->khoi_tao($mssv, $hoTen, $gioiTinh, $ngaySinh, $diemTB);
    $_SESSION['mangSinhVien'][] = $sinhVien;
}

$mangSinhVien = $_SESSION['mangSinhVien'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin sinh viên đã lưu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 8px;
        }
        .sv-card {
            background: white;
            padding: 16px 20px;
            margin: 12px 0;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            border-left: 4px solid #2980b9;
        }
        .sv-card p {
            margin: 4px 0;
            color: #333;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover { background: #1e8449; }
        .btn-clear {
            display: inline-block;
            margin-top: 20px;
            margin-left: 10px;
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .empty { color: #888; font-style: italic; }
    </style>
</head>
<body>

<h2>Thông tin sinh viên đã lưu</h2>

<?php if (empty($mangSinhVien)): ?>
    <p class="empty">Chưa có sinh viên nào được lưu.</p>
<?php else: ?>
    <p>Tổng số sinh viên: <strong><?= count($mangSinhVien) ?></strong></p>

    <?php foreach ($mangSinhVien as $index => $sv): ?>
        <div class="sv-card">
            <p><strong>STT:</strong> <?= $index + 1 ?></p>
            <?php $sv->hienThiThongTin(); ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<a href="nhap_sinh_vien.html" class="btn-back">Nhập thêm sinh viên</a>
<a href="xoa_du_lieu.php" class="btn-clear">Xóa tất cả</a>

</body>
</html>