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
    $pro_cost = trim($_POST['pro_cost']);
    $cat_id = trim($_POST['cat_id']);
    $pro_img = trim($_POST['pro_img']);

    if (empty($pro_name) || !is_numeric($pro_price) || !is_numeric($pro_cost) || empty($cat_id) || empty($pro_img)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง');</script>";
    } else {
        // อัปเดตข้อมูลสินค้า
        $sql = "UPDATE products 
                SET pro_name = :pro_name, pro_price = :pro_price, pro_cost = :pro_cost, cat_id = :cat_id, pro_img = :pro_img 
                WHERE pro_id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
        $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);
        $query->bindParam(':pro_cost', $pro_cost, PDO::PARAM_STR);
        $query->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $query->bindParam(':pro_img', $pro_img, PDO::PARAM_STR);
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
                    <form method="POST">
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
                            <label class="form-label">ต้นทุนสินค้า (บาท)</label>
                            <input type="text" name="pro_cost" value="<?= htmlspecialchars($product->pro_cost) ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ลิงก์รูปภาพ</label>
                            <input type="text" name="pro_img" id="pro_img" value="<?= htmlspecialchars($product->pro_img ?? '') ?>" class="form-control" oninput="previewImage()" required>
                        </div>

                        <!-- แสดงตัวอย่างรูปภาพ -->
                        <div class="mb-3 text-center">
                            <img id="imagePreview" src="<?= htmlspecialchars($product->pro_img ?? '') ?>" class="img-fluid rounded" style="max-height: 200px; display: <?= isset($product->pro_img) && !empty($product->pro_img) ? 'block' : 'none' ?>;">
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

<script>
function previewImage() {
    const imageUrl = document.getElementById('pro_img').value;
    const imgPreview = document.getElementById('imagePreview');
    
    if (imageUrl) {
        imgPreview.src = imageUrl;
        imgPreview.style.display = 'block';
    } else {
        imgPreview.style.display = 'none';
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
