<?php
session_start();
include("include/config.php"); // รวมไฟล์เชื่อมต่อฐานข้อมูล

// รับค่าจาก URL (ID ของสินค้าที่ต้องการดูรายละเอียด)
$pro_id = $_GET['id'] ?? null;

if (!$pro_id) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการดูรายละเอียด'); window.location.href = 'index.php';</script>";
    exit;
}

// ดึงข้อมูลสินค้าจากฐานข้อมูลพร้อมกับข้อมูลหมวดหมู่
$sql = "
    SELECT p.*, c.cat_name 
    FROM products p
    LEFT JOIN category c ON p.cat_id = c.cat_id
    WHERE p.pro_id = :id
";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $pro_id, PDO::PARAM_INT);
$query->execute();
$product = $query->fetch(PDO::FETCH_OBJ);

if (!$product) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการดูรายละเอียด'); window.location.href = 'index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>รายละเอียดสินค้า</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- แสดงภาพสินค้าหากมี -->
                            <?php if ($product->pro_img): ?>
                                <img src="<?= htmlspecialchars($product->pro_img) ?>" alt="Product Image" class="img-fluid">
                            <?php else: ?>
                                <img src="default-image.jpg" alt="Product Image" class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <h5>ชื่อสินค้า: <?= htmlspecialchars($product->pro_name) ?></h5>
                            <p><strong>หมวดหมู่: </strong><?= htmlspecialchars($product->cat_name) ?></p>
                            <p><strong>ราคา: </strong><?= number_format($product->pro_price, 2) ?> บาท</p>
                            <p><strong>ต้นทุนสินค้า: </strong><?= number_format($product->pro_cost, 2) ?> บาท</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="welcome.php" class="btn btn-secondary">กลับไปหน้าหลัก</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
