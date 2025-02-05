<?php
session_start();
include("../include/config.php");

// รับค่า ID ของสินค้าที่จะทำการแก้ไข
$pro_id = $_GET['id'];

// ตรวจสอบว่ามี ID สินค้าหรือไม่
if (!$pro_id) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการแก้ไข'); window.location.href = 'manage_product.php';</script>";
    exit;
}

// คำสั่ง SQL เพื่อดึงข้อมูลสินค้า
$sql = "SELECT * FROM products WHERE pro_id = :id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $pro_id, PDO::PARAM_INT);
$query->execute();
$product = $query->fetch(PDO::FETCH_OBJ);

// หากไม่พบสินค้า
if (!$product) {
    echo "<script>alert('ไม่พบสินค้าที่ต้องการแก้ไข'); window.location.href = 'manage_product.php';</script>";
    exit;
}

// ตรวจสอบการส่งข้อมูลแก้ไข
if (isset($_POST['submit'])) {
    // Get input and sanitize
    $pro_name = trim($_POST['pro_name']);
    $pro_price = trim($_POST['pro_price']);

    // Validate inputs
    if (empty($pro_name) || !is_numeric($pro_price)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง');</script>";
    } else {
        // คำสั่ง SQL เพื่ออัพเดตข้อมูลสินค้า
        $sql = "UPDATE products SET pro_name = :pro_name, pro_price = :pro_price WHERE pro_id = :id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pro_name', $pro_name, PDO::PARAM_STR);
        $query->bindParam(':pro_price', $pro_price, PDO::PARAM_STR);
        $query->bindParam(':id', $pro_id, PDO::PARAM_INT);
        $query->execute();

        // แสดงข้อความสำเร็จและไปยังหน้าจัดการสินค้า
        echo "<script>alert('แก้ไขสินค้าสำเร็จ'); window.location.href = 'manage_product.php';</script>";
    }
}
?>

<form method="POST" action="">
    <div>
        <label>ชื่อสินค้า</label>
        <input type="text" name="pro_name" value="<?= htmlspecialchars($product->pro_name) ?>" required>
    </div>
    <div>
        <label>ราคา</label>
        <input type="text" name="pro_price" value="<?= htmlspecialchars($product->pro_price) ?>" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">แก้ไขสินค้า</button>
</form>
