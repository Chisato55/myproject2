<?php
session_start();
include("../include/config.php");

// รับค่า ID ของสินค้าที่ต้องการแก้ไข
$pro_id = $_GET['id'] ?? null;

if (!$pro_id) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการแก้ไข'); window.location.href = 'manage_product.php';</script>";
    exit;
}

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM products WHERE pro_id = :id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $pro_id, PDO::PARAM_INT);
$query->execute();
$product = $query->fetch(PDO::FETCH_OBJ);

if (!$product) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการแก้ไข'); window.location.href = 'manage_product.php';</script>";
    exit;
}

// ดึงหมวดหมู่สินค้า
$sql_cat = "SELECT * FROM category";
$query_cat = $dbh->prepare($sql_cat);
$query_cat->execute();
$categories = $query_cat->fetchAll(PDO::FETCH_OBJ);

// ตรวจสอบการส่งข้อมูลแก้ไข
if (isset($_POST['submit'])) {
    $pro_name = trim($_POST['pro_name']);
    $pro_price = trim($_POST['pro_price']);
    $cat_id = trim($_POST['cat_id']);
    $image_path = $product->pro_image; // ค่าเดิมของรูปภาพ

    if (empty($pro_name) || !is_numeric($pro_price) || empty($cat_id)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง');</script>";
    } else {
        // ตรวจสอบว่ามีการอัปโหลดรูปภาพหรือไม่
        if (!empty($_FILES['pro_image']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ["jpg", "jpeg", "png", "gif"];

            if (in_array($imageFileType, $allowed_types)) {
                if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
                    $image_path = $target_file;
                } else {
                    echo "<script>alert('อัปโหลดรูปภาพไม่สำเร็จ');</script>";
                }
            } else {
                echo "<script>alert('ไฟล์รูปภาพต้องเป็น JPG, JPEG, PNG หรือ GIF เท่านั้น');</script>";
            }
        }

        // อัปเดตข้อมูลสินค้า
        $sql = "UPDATE products SET pro_name = :pro_name, pro_price = :pro_price, cat_id = :cat_id, pro_image = :pro_image WHERE pro_id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
        $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);
        $query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $query->bindParam(':pro_image', $image_path, PDO::PARAM_STR);
        $query->bindParam(':id', $pro_id, PDO::PARAM_INT);
        $query->execute();

        echo "<script>alert('แก้ไขสินค้าสำเร็จ'); window.location.href = 'manage_product.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>แก้ไขสินค้า</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ชื่อสินค้า</label>
                            <input type="text" name="pro_name" value="<?= htmlspecialchars($product->pro_name) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">หมวดหมู่สินค้า</label>
                            <select name="cat_id" class="form-control" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->cat_id ?>" <?= ($product->cat_id == $category->cat_id) ? "selected" : "" ?>>
                                        <?= htmlspecialchars($category->cat_name) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ราคา (บาท)</label>
                            <input type="text" name="pro_price" value="<?= htmlspecialchars($product->pro_price) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">อัปโหลดรูปสินค้า (ถ้ามี)</label>
                            <input type="file" name="pro_image" class="form-control">
                            <?php if (!empty($product->pro_image)): ?>
                                <img src="<?= htmlspecialchars($product->pro_image) ?>" alt="Product Image" class="img-thumbnail mt-2" width="150">
                            <?php endif; ?>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success w-100">บันทึกการแก้ไข</button>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="manage_product.php" class="btn btn-secondary">กลับไปหน้าจัดการสินค้า</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
