<?php
include("include/config.php");

// ตรวจสอบการ login และ session
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;  // ตรวจสอบว่า session 'username' ถูกตั้งค่าหรือไม่

// ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
$sql = "SELECT pro_id, pro_name, pro_price, pro_img FROM products";
$query = $dbh->prepare($sql);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_OBJ);

// ฟังก์ชัน logout
if (isset($_POST['logout'])) {
    session_destroy(); // ลบข้อมูล session
    header("Location: login.php"); // เปลี่ยนไปยังหน้าล็อกอิน
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>สินค้าทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">สินค้าทั้งหมด</h2>

    <?php if ($username): ?>
        <div class="text-end mb-3">
            <form method="POST">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
        </div>
    <?php else: ?>
        <div class="text-end mb-3">
            <a href="login.php" class="btn btn-primary">Logout</a>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="<?= htmlspecialchars($product->pro_img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->pro_name) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product->pro_name) ?></h5>
                        <p class="card-text">ราคา: <?= number_format($product->pro_price, 2) ?> บาท</p>
                        <a href="product_detail.php?id=<?= $product->pro_id ?>" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
